<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{

    public function CategoryValidationRules($rules = [])
    {
        return array_merge([
            "title" => ['required', 'array'],
            "title.*" => ['array'],
            "title.*.translation" => ['required', 'string'],
            "title.*.language" => ['required', 'string', Rule::in(config('app.supported_locales'))],
            "slug" => ['nullable', 'string'],
            "status" => ['required', "in:0,1"],
        ], $rules);
    }

    public function listCategories(CategoriesDataTable $categoriesDataTable)
    {
        return $categoriesDataTable->render("dashboard.pages.categories.categories-listing");
    }
    public function showCreateForm(Request $request)
    {
        return view('dashboard.pages.categories.category-form');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->categoryValidationRules())->validate();

        $category = new Category();

        foreach ($data["title"] as  $title) {
            $category->setTranslation('title', $title['language'], $title["translation"]);
        }
        $category->status = $data['status'];
        $category->slug = $data['slug'] ?? null;
        $category->save();

        return back()->with('success', __("new record added successfully"));
    }


    public function showUpdateForm(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.pages.categories.categories-update', ['category' => $category]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->categoryValidationRules([
            "id" => ['required', 'exists:categories'],
        ]))->validate();

        $category = Category::findOrFail($data['id']);

        foreach ($data["title"] as  $title) {
            $category->setTranslation('title', $title['language'], $title["translation"]);
        }
        $category->status = $data['status'];
        $category->slug = $data['slug'] ?? null;
        $category->save();

        return (isset($data['toList']) ? redirect(route('categories')) : back()->with('success', __("record updated successfully")));
    }

    public function delete($id)
    {
        $res = Category::findOrFail($id)->delete();

        if ($res > 0) {
            return back()->with('success', __("record deleted successfully"));
        } else {
            return back()->with('error', __("something went wrong! please try again"));
        }
    }

}
