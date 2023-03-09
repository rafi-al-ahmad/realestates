<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Agent;
use App\Models\Article;
use App\Models\Category;
use App\Models\City;
use App\Models\Definition;
use App\Models\Property;
use App\Models\PropertyFeatures;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $agents = Agent::select('id', 'name', 'surname')->where('status', 1)->get();
        $categories = Category::select('id', 'title')->where('status', 1)->get();
        $allDefinitions = Definition::select('id', 'title', 'type', 'group')->where('status', 1)->get();
        $citiesByProperties = City::select('cities.id', 'cities.name', DB::raw('COUNT(properties.id) as properties_count'))
            ->join('properties', 'properties.city_id', '=', 'cities.id')
            ->groupBy('cities.id')
            ->groupBy('cities.name')
            ->orderBy('properties_count', 'DESC')
            ->limit(4)
            ->with(['media'])
            ->get();

        $articles = Article::where('status', 1)->limit(3)->get();

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

        $featuredProperties = Property::where('is_featured', 1)->with([
            'media',
            'propertyType',
            'housingType',
            'address',
            'agent',
        ])->get();
        // $featuredProperties = Property::where('is_featured', 1)->get();

        return view('frontpage.pages.home', [
            "propertyType" => $definitions['property_type'] ?? [],
            "housingType" => $definitions['housing_type'] ?? [],
            "heatingType" => $definitions['heating_type'] ?? [],
            "userStatus" => $definitions['user_status'] ?? [],
            "buildingAge" => $definitions['building_age'] ?? [],
            "features" => $featuresByGroup,
            "advertisementType" => $definitions['advertisement_type'] ?? [],
            "agents" => $agents,
            "categories" => $categories,
            "citiesByProperties" => $citiesByProperties,
            "featuredProperties" => $featuredProperties,
            "articles" => $articles,
        ]);
    }

    public function filter(Request $request)
    {
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

        $featuredProperties = Property::where('is_featured', 1)->with([
            'media',
            'propertyType',
            'housingType',
            'address',
            'agent',
        ])->limit(9)->get();

        $query = Property::with([
            'media',
            'propertyType',
            'housingType',
            'address',
            'agent',
        ]);

        if ($request->address) {
            $q = Address::select('id')
                ->where(function ($wQuery) use ($request) {
                    $wQuery->where('country_code', 'Like', '%' . $request->address . '%')
                        ->orWhere('address', 'Like', '%' . $request->address . '%');
                });

            $addresses_ids = $q->get()?->pluck('id');

            $query->select('properties.*')->join('addresses', function ($join) {
                $join->on('addresses.model_id', '=', 'properties.id')
                    ->where('addresses.model_type', '=', Property::class);
            })->whereIn('addresses.id', $addresses_ids);
        }

        if ($request->keyword and $request->keyword != NULL) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'Like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'Like', '%' . $request->keyword . '%');
            });
        }

        if ($request->housing_type and $request->housing_type != NULL) {
            $query->where('housing_type_id', $request->housing_type);
        }

        if ($request->property_type and $request->property_type != NULL) {
            $query->where('property_type_id', $request->property_type);
        }

        if ($request->max_price and $request->max_price != NULL) {
            $query->where('price_tl', '<', $request->max_price);
        }

        if ($request->min_price and $request->min_price != NULL) {
            $query->where('price_tl', '>', $request->min_price);
        }


        if ($request->type_id  and $request->type_id != NULL) {
            $type_id = explode(",", $request->type_id);
            $query->whereIn('type_id', $type_id);
        }
        if ($request->sortBy  and $request->sortBy != NULL) {
            if ($request->sortBy == 1) {
                $query->orderBy('price_tl', 'asc');
            } elseif ($request->sortBy == 2) {
                $query->orderBy('price_tl', 'desc');
            } elseif ($request->sortBy == 3) {
                $query->orderBy('id', 'desc');
            } elseif ($request->sortBy == 4) {
                $query->orderBy('id', 'asc');
            }
        }

        if ($request->features and  $request->features != NULL) {
            $features = $request->features;
            $query->whereHas('features', function ($q) use ($features) {
                $q->whereIn('feature_id', $features);
            });
        }

        if ($request->bedrooms) {
            $query->where('bedrooms_no', $request->bedrooms);
        }

        if ($request->bathrooms) {
            $query->where('bathrooms_no', $request->bathrooms);
        }

        if ($request->living_rooms) {
            $query->where('living_rooms_no', $request->living_rooms);
        }

        if ($request->age) {
            $query->where('building_age_id', $request->age);
        }

        if ($request->agent_id) {
            $query->where('agent_id', $request->agent_id);
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }


        $properties = $query->paginate($request->limit);


        $categories = Category::select('id', 'title')->where('status', 1)->with('properties')->whereHas('properties')->get();

        return view('frontpage.pages.properties', [
            "propertyType" => $definitions['property_type'] ?? [],
            "housingType" => $definitions['housing_type'] ?? [],
            "heatingType" => $definitions['heating_type'] ?? [],
            "userStatus" => $definitions['user_status'] ?? [],
            "buildingAge" => $definitions['building_age'] ?? [],
            "categories" => $categories,
            "features" => $featuresByGroup,
            "advertisementType" => $definitions['advertisement_type'] ?? [],
            "featuredProperties" => $featuredProperties,
            "properties" => $properties,
        ]);
    }


    public function showProperty($id)
    {
        $property = Property::find($id);

        $definitions = Definition::getActiveByType();
        $featuresByGroup = PropertyFeatures::getFeaturesByGroup($definitions['feature'] ?? new Collection());
        $propertyFeaturesByGroup = PropertyFeatures::getFeaturesByGroup($property->features);
        $featuredProperties = Property::getActiveFeatured();
        $categories = Category::select('id', 'title')->where('status', 1)->with('properties')->whereHas('properties')->get();

        if ($property) {
            return view('frontpage.pages.property-details', [
                "propertyType" => $definitions['property_type'] ?? [],
                "buildingAge" => $definitions['building_age'] ?? [],
                "categories" => $categories,
                "propertyFeatures" => $propertyFeaturesByGroup,
                "features" => $featuresByGroup,
                "featuredProperties" => $featuredProperties,
                "property" => $property,
            ]);
        } else {
            return redirect(route('home'));
        }
    }

    public function showContactUsPage()
    {
        return view('frontpage.pages.contact-us');
    }

    public function showAboutUsPage()
    {
        $agents = Agent::where('status', 1)->get();

        $definitions = Definition::getActiveByType();
        $featuresByGroup = PropertyFeatures::getFeaturesByGroup($definitions['feature'] ?? new Collection());

        return view('frontpage.pages.about-us', [
            'agents' => $agents,
            "propertyType" => $definitions['property_type'] ?? [],
            "housingType" => $definitions['housing_type'] ?? [],
            "buildingAge" => $definitions['building_age'] ?? [],
            "features" => $featuresByGroup,

        ]);
    }

    public function showCitizenshipPage()
    {
        $agents = Agent::where('status', 1)->get();

        $definitions = Definition::getActiveByType();
        $featuresByGroup = PropertyFeatures::getFeaturesByGroup($definitions['feature'] ?? new Collection());

        return view('frontpage.pages.citizenship', [
            'agents' => $agents,
            "propertyType" => $definitions['property_type'] ?? [],
            "housingType" => $definitions['housing_type'] ?? [],
            "buildingAge" => $definitions['building_age'] ?? [],
            "features" => $featuresByGroup,
        ]);
    }
}
