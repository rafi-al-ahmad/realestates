<?php

namespace App\Http\Controllers;

use App\DataTables\AgentsDataTable;
use App\Models\Agent;
use App\Models\Category;
use App\Models\Definition;
use App\Models\Property;
use App\Models\PropertyFeatures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{

    public function AgentValidationRules($rules = [])
    {
        return array_merge([
            "name" => ['required', 'string'],
            "surname" => ['required', 'string'],
            "status" => ['required', "in:0,1"],
            "email" => ['required', 'email', 'string'],
            "phone" => ['required', 'string'],
            "office" => ['nullable', 'string'],
            "fax" => ['nullable', 'string'],
            "photo" => ['nullable', 'file:image'],
            "languages" => ['nullable', 'array'],
            "languages.*" => ['array'],
            "languages.*.language-name" => ['required'],
        ], $rules);
    }

    public function listAgents(AgentsDataTable $agentsDataTable)
    {
        return $agentsDataTable->render("dashboard.pages.agents.agents-listing");
    }
    public function showCreateForm(Request $request)
    {
        return view('dashboard.pages.agents.agent-form');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->agentValidationRules())->validate();

        $photo_path = $request->file('photo')?->store('agents');
        $languages = [];
        if (isset($data['languages'])) {
            foreach ($data['languages'] as $lang) {
                $languages[] = strtolower($lang['language-name']);
            }
        }

        Agent::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'status' => $data['status'],
            'email' => $data['email'],
            'mobile_phone' => $data['phone'],
            'office_phone' => $data['office'] ?? null,
            'fax' => $data['fax'] ?? null,
            'photo' => $photo_path,
            'languages' => $languages,
        ]);

        return (isset($data['toList']) ? redirect(route('agents')) : back()->with('success', __("new record added successfully")));
    }


    public function showUpdateForm(Request $request, $id)
    {
        $agent = Agent::findOrFail($id);
        return view('dashboard.pages.agents.agent-form', ['agent' => $agent]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->agentValidationRules([
            "id" => ['required', 'exists:agents'],
        ]))->validate();

        $agent = Agent::findOrFail($data['id']);
        $agent->name = $data['name'];
        $agent->surname = $data['surname'];
        $agent->email = $data['email'];
        $agent->status = $data['status'];
        $agent->office_phone = $data['office'];
        $agent->fax = $data['fax'];
        $agent->mobile_phone = $data['phone'];
        if ($request->has('photo')) {
            $photo_path = $request->file('photo')?->store('agents');
            if (Storage::exists($agent->photo)) {
                Storage::delete($agent->photo);
            }
            $agent->photo = $photo_path;
        }

        if (isset($data['languages'])) {
            $languages = [];
            foreach ($data['languages'] as $lang) {
                $languages[] = $lang['language-name'];
            }
            $agent->languages = $languages;
        }

        $agent->save();

        return (isset($data['toList']) ? redirect(route('agents')) : back()->with('success', __("record updated successfully")));
    }

    public function delete($id)
    {
        $res = Agent::findOrFail($id)->delete();

        if ($res > 0) {
            return back()->with('success', __("record deleted successfully"));
        } else {
            return back()->with('error', __("something went wrong! please try again"));
        }
    }

    public function showAgents()
    {
        $agents = Agent::where('status', 1)->with('listingNumber')->paginate(6);
        $definitions = Definition::getActiveByType();
        $featuresByGroup = PropertyFeatures::getFeaturesByGroup($definitions['feature'] ?? []);
        $featuredProperties = Property::getActiveFeatured();
        $categories = Category::select('id', 'title')->where('status', 1)->with('properties')->whereHas('properties')->get();


        return view('frontpage.pages.agents', [
            "agents" => $agents,
            "propertyType" => $definitions['property_type'] ?? [],
            "buildingAge" => $definitions['building_age'] ?? [],
            "categories" => $categories,
            "features" => $featuresByGroup,
            "featuredProperties" => $featuredProperties,
        ]);
    }
}
