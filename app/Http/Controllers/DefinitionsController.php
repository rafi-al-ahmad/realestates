<?php

namespace App\Http\Controllers;

use App\DataTables\DefinitionsDataTable;
use App\Models\Definition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DefinitionsController extends Controller
{

    public function definitionsValidationRules($rules = [])
    {
        return array_merge([
            'title' => ['required', 'array'],
            'title' => ['required', 'array'],
            'title.*.translation' => ['required', 'max:250'],
            'title.*.language' => ['required', 'max:6', Rule::in(config('app.supported_locales'))],
            'type' => ['required', 'max:60', Rule::in(Definition::types)],
            'status' => ['required', Rule::in([0, 1])],
            'group' => ['nullable', 'max:60'],
        ], $rules);
    }


    public function listDefinitions(DefinitionsDataTable $definitionsDataTable, Request $request)
    {
        $datatableArray = [];
        if ($request->draw != 1) {
            foreach (Definition::types as $key => $type) {
                $definitionsDataTableClone = new DefinitionsDataTable();
                $datatableArray[$type] = $definitionsDataTableClone->with(['type' => $type])->html();
            }
        }

        return $definitionsDataTable->with(['type' => $request->type])->render("dashboard.pages.definitions.definitions-listing", ["datatableArray" => $datatableArray]);
    }


    public function showCreateForm(Request $request)
    {
        return view('dashboard.pages.definitions.definition-form');
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => ['required', 'array'],
            'title.*.translation' => ['required', 'max:250'],
            'title.*.language' => ['required', 'max:6'],
            'type' => ['required', 'max:60', Rule::in(Definition::types)],
            'status' => ['required', Rule::in([0, 1])],
            'group' => ['nullable', 'max:60'],
        ])->validate();

        $definition = new Definition();
        $definition->type = strtolower($data['type']);
        $definition->status = $data['status'];

        foreach ($data["title"] as $title) {
            $definition->setTranslation("title", $title["language"], $title["translation"]);
        }
        if ($request->group) {
            $definition->group =  strtolower($data['group']);
        }
        $definition->save();

        return (isset($data['toList']) ? redirect(route('definitions')) : back()->with('success', __("new record successfully")));
    }


    public function showUpdateForm(Request $request, $id)
    {
        $definition = Definition::find($id);
        return view('dashboard.pages.definitions.definition-form', ['definition' => $definition]);
    }



    public function update(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->definitionsValidationRules([
            "id" => ['required', 'exists:definitions'],
        ]))->validate();

        $definition = Definition::find($data['id']);
        $definition->type = strtolower($data['type']);
        $definition->status = $data['status'];

        foreach ($data["title"] as $title) {
            $definition->setTranslation("title", $title["language"], $title["translation"]);
        }
        $definition->group = $request->group ? strtolower($data['group']) : null;
        $definition->save();

        return (isset($data['toList']) ? redirect(route('definitions')) : back()->with('success', __("record update successfully")));
    }

    public function delete($id)
    {
        $res = Definition::findOrFail($id)->delete();

        if ($res > 0) {
            return back()->with('success', __("record deleted successfully"));
        } else {
            return back()->with('error', __("something went wrong! please try again"));
        }
    }

}
