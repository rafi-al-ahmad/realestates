<?php

namespace App\Http\Controllers;

use App\DataTables\PropertiesDataTable;
use App\Models\Agent;
use App\Models\Category;
use App\Models\City;
use App\Models\Definition;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PropertiesController extends Controller
{

    public function propertiesValidationRules($rules = [])
    {
        return array_merge([
            'translations' => ['required', 'array'],
            'translations' => ['required', 'array'],
            'translations.*.title' => ['required', 'max:250'],
            'translations.*.meta_title' => ['required', 'max:250'],
            'translations.*.description' => ['required', 'max:4000'],
            'translations.*.meta_description' => ['required', 'max:4000'],
            'translations.*.language' => ['required', 'max:6', Rule::in(config('app.supported_locales'))],
            'status' => ['required', Rule::in([0, 1])],
            'agent_id' => ['required', Rule::exists('agents', 'id')->where('status', 1)],
            'property_type' => ['required', Rule::exists('definitions', 'id')->where('status', 1)->where('type', 'property_type')],
            'category_id' => ['required', Rule::exists('categories', 'id')->where('status', 1)],
            'price_tl' => ['required', 'numeric'],
            'price_usd' => ['required', 'numeric'],
            'interchange' => ['required', Rule::in([0, 1])],
            'is_furnished' => ['nullable', Rule::in([0, 1])],
            'is_featured' => ['nullable', Rule::in([0, 1])],
            'credit_eligibility' => ['required', Rule::in([0, 1])],
            'housing_type' => ['required', Rule::exists('definitions', 'id')->where('status', 1)->where('type', 'housing_type')],
            'heating_type' => ['required', Rule::exists('definitions', 'id')->where('status', 1)->where('type', 'heating_type')],
            'building_age' => ['required', Rule::exists('definitions', 'id')->where('status', 1)->where('type', 'building_age')],
            'user_status' => ['required', Rule::exists('definitions', 'id')->where('status', 1)->where('type', 'user_status')],
            'features' => ['nullable', 'array'],
            'features.*' => ['required', Rule::exists('definitions', 'id')->where('status', 1)->where('type', 'feature')],
            'rent_deposit' => ['nullable', 'numeric'],
            'rental_income' => ['nullable', 'numeric'],
            'dues' => ['nullable', 'numeric'],
            'net_area' => ['required', 'numeric'],
            'gross_area' => ['required', 'numeric'],
            'living_rooms_no' => ['required', 'numeric'],
            'bedrooms_no' => ['required', 'numeric'],
            'bathrooms_no' => ['required', 'numeric'],
            'building_floors' => ['required', 'numeric'],
            'floor_number' => ['required', 'numeric'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['nullable', 'file', 'image'],
        ], $rules);
    }


    public function listProperties(PropertiesDataTable $propertiesDataTable)
    {
        return $propertiesDataTable->render("dashboard.pages.properties.properties-listing");
    }
    public function showForm(Request $request, $id = null)
    {
        $agents = Agent::select('id', 'name', 'surname')->where('status', 1)->get();
        $categories = Category::select('id', 'title')->where('status', 1)->get();
        $cities = City::select('id', 'name')->where('status', 1)->get();
        $allDefinitions = Definition::select('id', 'title', 'type', 'group')->where('status', 1)->get();

        // group features by group attribute
        $definitions = [];
        foreach ($allDefinitions as $definition) {
            $definitions[$definition->type][] = $definition;
        }

        // group features by group attribute
        $featuresByGroup = [];
        foreach ($definitions['feature'] ?? [] as $feature) {
            if ($feature->group == null) {
                $featuresByGroup[0][] = $feature;
            } else {
                $featuresByGroup[$feature->group][] = $feature;
            }
        }

        $property = null;
        if ($id) {
            $property = Property::with('features')->find($id);
        }


        return view('dashboard.pages.properties.property-form', [
            "propertyType" => $definitions['property_type'] ?? [],
            "housingType" => $definitions['housing_type'] ?? [],
            "heatingType" => $definitions['heating_type'] ?? [],
            "userStatus" => $definitions['user_status'] ?? [],
            "buildingAge" => $definitions['building_age'] ?? [],
            "features" => $featuresByGroup,
            "advertisementType" => $definitions['advertisement_type'] ?? [],
            "agents" => $agents,
            "categories" => $categories,
            "cities" => $cities,
            "property" => $property
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $addressController = new AddressController;
        $validator = Validator::make($data, $this->propertiesValidationRules($addressController->addressValidationRules()))->validate();

        $property = new Property();
        foreach ($data["translations"] as $translation) {
            $property->setTranslation("title", $translation["language"], $translation["title"]);
            $property->setTranslation("meta_title", $translation["language"], $translation["meta_title"]);
            $property->setTranslation("description", $translation["language"], $translation["description"]);
            $property->setTranslation("meta_desc", $translation["language"], $translation["meta_description"]);
        }

        $property->status = $data['status'];
        $property->price_tl = $data['price_tl'];
        $property->price_usd = $data['price_usd'];
        $property->is_furnished = $data['is_furnished'] ?? 0;
        $property->is_featured = $data['is_featured'] ?? 0;
        $property->credit_eligibility = $data['credit_eligibility'];
        $property->interchange = $data['interchange'];
        $property->housing_type_id = $data['housing_type'];
        $property->building_age_id = $data['building_age'];
        $property->heating_type_id = $data['heating_type'];
        $property->rent_deposit = $data['rent_deposit'] ?? null;
        $property->rental_income = $data['rental_income'] ?? null;
        $property->dues = $data['dues'] ?? null;
        $property->net_area = $data['net_area'];
        $property->gross_area = $data['gross_area'];
        $property->living_rooms_no = $data['living_rooms_no'];
        $property->bedrooms_no = $data['bedrooms_no'];
        $property->bathrooms_no = $data['bathrooms_no'];
        $property->building_floors = $data['building_floors'];
        $property->floor_number = $data['floor_number'];
        $property->user_status_id = $data['user_status'];
        $property->property_type_id = $data['property_type'];
        $property->category_id = $data['category_id'];
        $property->agent_id = $data['agent_id'];
        $property->city_id = $data['city_id'] ?? null;

        $property->save();

        if ($request->has('photos')) {
            foreach ($request->photos as $photo) {
                $property->addMedia($photo)->toMediaCollection('property-photos');
            }
        }

        $address = $addressController->createOrUpdate([
            'geodata' => $data['geodata'],
            'country' => $data['country'],
            'province' => $data['province'],
            'city' => $data['city'],
            'district' => $data['district'],
            'postal_code' => $data['postal_code'],
            'address' => $data['address'],
        ], $property);


        if (isset($data['features'])) {
            $property->features()->attach($data['features']);
        }

        return (isset($data['toList']) ? redirect(route('properties')) : back()->with('success', __("new record added successfully")));
    }


    public function update(Request $request)
    {
        $data = $request->all();

        $addressController = new AddressController;
        $validator = Validator::make($data, $this->propertiesValidationRules(array_merge([
            "id" => ['required', 'exists:properties']
        ],$addressController->addressValidationRules())))->validate();

        $property = Property::find($data['id']);
        foreach ($data["translations"] as $translation) {
            $property->setTranslation("title", $translation["language"], $translation["title"]);
            $property->setTranslation("meta_title", $translation["language"], $translation["meta_title"]);
            $property->setTranslation("description", $translation["language"], $translation["description"]);
            $property->setTranslation("meta_desc", $translation["language"], $translation["meta_description"]);
        }

        $property->status = $data['status'];
        $property->price_tl = $data['price_tl'];
        $property->price_usd = $data['price_usd'];
        $property->is_furnished = $data['is_furnished'] ?? 0;
        $property->is_featured = $data['is_featured'] ?? 0;
        $property->credit_eligibility = $data['credit_eligibility'];
        $property->interchange = $data['interchange'];
        $property->housing_type_id = $data['housing_type'];
        $property->building_age_id = $data['building_age'];
        $property->heating_type_id = $data['heating_type'];
        $property->rent_deposit = $data['rent_deposit'] ?? null;
        $property->rental_income = $data['rental_income'] ?? null;
        $property->dues = $data['dues'] ?? null;
        $property->net_area = $data['net_area'];
        $property->gross_area = $data['gross_area'];
        $property->living_rooms_no = $data['living_rooms_no'];
        $property->bedrooms_no = $data['bedrooms_no'];
        $property->bathrooms_no = $data['bathrooms_no'];
        $property->building_floors = $data['building_floors'];
        $property->floor_number = $data['floor_number'];
        $property->user_status_id = $data['user_status'];
        $property->property_type_id = $data['property_type'];
        $property->category_id = $data['category_id'];
        $property->agent_id = $data['agent_id'];
        $property->city_id = $data['city_id'] ?? null;

        $property->save();

        if (isset($data['photos'])) {
            foreach ($data['photos'] as  $file) {
                $property->addMedia($file)->toMediaCollection('property-photos');
            }
        }


        $address = $addressController->createOrUpdate([
            'geodata' => $data['geodata'],
            'country' => $data['country'],
            'province' => $data['province'],
            'city' => $data['city'],
            'district' => $data['district'],
            'postal_code' => $data['postal_code'],
            'address' => $data['address'],
        ], $property, $property?->address?->id);


        if (isset($data['features'])) {
            $propertyFeatures = $property->features?->pluck('id')->toArray();
            $property->features()->detach(array_diff($propertyFeatures, $data['features']));
            $property->features()->attach(array_diff($data['features'], $propertyFeatures));
        }

        return (isset($data['toList']) ? redirect(route('properties')) : back()->with('success', __("record updated successfully")));
    }

    public function delete($id)
    {
        $res = Property::findOrFail($id)->delete();

        if ($res > 0) {
            return back()->with('success', __("record deleted successfully"));
        } else {
            return back()->with('error', __("something went wrong! please try again"));
        }
    }

}
