<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Agent;
use App\Models\Category;
use App\Models\Definition;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $agents = Agent::select('id', 'name', 'surname')->where('status', 1)->get();
        $categories = Category::select('id', 'title')->where('status', 1)->get();
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
            "featuredProperties" => $featuredProperties,
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

        if ($request->features and  $request->features != NULL) {
            $features = $request->features;
            $query->whereHas('features', function ($q) use ($features) {
                $q->whereIn('feature_id', $features);
            });
        }

        if ($request->has('bedrooms')) {
            $query->where('bedrooms_no', $request->bedrooms);
        }

        if ($request->has('bathrooms')) {
            $query->where('bathrooms_no', $request->bathrooms);
        }

        if ($request->has('living_rooms')) {
            $query->where('living_rooms_no', $request->living_rooms);
        }

        if ($request->has('age')) {
            $query->where('building_age_id', $request->age);
        }

        if ($request->has('agent_id')) {
            $query->where('agent_id', $request->agent_id);
        }

        // if ($request->has('min_size') and $request->min_size != NULL) {
        //     $query->where('square', '>=', $request->min_size);
        // }

        // if ($request->has('max_size') and $request->max_size != NULL) {
        //     $query->where('square', '<=', $request->max_size);
        // }

        // if ($request->has('order_by') && $request->has('order_direction')) {
        //     !in_array($request->order_direction, ['desc', 'asc']) ? $request->order_direction = 'desc' : '';
        //     $orderBy = null;

        //     if ($request->order_by == 'price') {
        //         $orderBy = 'price';
        //     } elseif ($request->order_by == 'last_updated') {
        //         $orderBy = 'updated_at';
        //     } elseif ($request->order_by == 'size') {
        //         $orderBy = 'square';
        //     }

        //     if ($orderBy) {
        //         $query->orderBy($orderBy, $request->order_direction);
        //     }
        // }


        $properties = $query->paginate($request->limit);
        // dd($properties->toArray());
        //     dd([
        //         "fragment" => $properties->fragment(),
        //         "nextPageUrl" => $properties->nextPageUrl(),
        //         "previousPageUrl" => $properties->previousPageUrl(),
        //         "firstItem" => $properties->firstItem(),
        //         "lastItem" => $properties->lastItem(),
        //         "perPage" => $properties->perPage(),
        //         "currentPage" => $properties->currentPage(),
        //         "hasPages" => $properties->hasPages(),
        //         "hasMorePages" => $properties->hasMorePages(),
        //         "path" => $properties->path(),
        //         "isEmpty" => $properties->isEmpty(),
        //         "total" => $properties->total(),
        //         "isNotEmpty" => $properties->isNotEmpty(),
        // ]);

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
        $allDefinitions = Definition::select('id', 'title', 'type', 'group')->where('status', 1)->get();

        // group definition by type 
        $definitions = [];
        foreach ($allDefinitions as $definition) {
            $definitions[$definition->type][] = $definition;
        }

        // group features by group attribute
        $featuresByGroup = [];
        foreach ($property->features ?? [] as $feature) {
            if ($feature->group == null) {
                $featuresByGroup[0][] = $feature;
            } else {
                $featuresByGroup[$feature->group][] = $feature;
            }
        }
        
        // group property features by group attribute
        $propertyFeaturesByGroup = [];
        foreach ($property->features ?? [] as $feature) {
            if ($feature->group == null) {
                $propertyFeaturesByGroup[0][] = $feature;
            } else {
                $propertyFeaturesByGroup[$feature->group][] = $feature;
            }
        }

        
        $featuredProperties = Property::where('is_featured', 1)->with([
            'media',
            'propertyType',
            'housingType',
            'address',
            'agent',
        ])->limit(9)->get();

        $categories = Category::select('id', 'title')->where('status', 1)->with('properties')->whereHas('properties')->get();

        // dd([
        //     "propertyType" => $definitions['property_type'] ?? [],
        //     // "housingType" => $definitions['housing_type'] ?? [],
        //     // "heatingType" => $definitions['heating_type'] ?? [],
        //     // "userStatus" => $definitions['user_status'] ?? [],
        //     "buildingAge" => $definitions['building_age'] ?? [],
        //     // "categories" => $categories,
        //     "propertyFeatures" => $propertyFeaturesByGroup,
        //     "features" => $featuresByGroup,
        //     // "advertisementType" => $definitions['advertisement_type'] ?? [],
        //     "featuredProperties" => $featuredProperties,
        //     // "properties" => $properties,
        //     "property" => $property,
        // ]);
        if ($property) {
            return view('frontpage.pages.property-details', [
                "propertyType" => $definitions['property_type'] ?? [],
                // "housingType" => $definitions['housing_type'] ?? [],
                // "heatingType" => $definitions['heating_type'] ?? [],
                // "userStatus" => $definitions['user_status'] ?? [],
                "buildingAge" => $definitions['building_age'] ?? [],
                "categories" => $categories,
                "propertyFeatures" => $propertyFeaturesByGroup,
                "features" => $featuresByGroup,
                // "advertisementType" => $definitions['advertisement_type'] ?? [],
                "featuredProperties" => $featuredProperties,
                // "properties" => $properties,
                "property" => $property,
            ]);
        } else {
            return redirect(route('home'));
        }
    }
}
