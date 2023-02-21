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
            "parent_id" => ['nullable', 'exists:categories,id'],
            "slug" => ['nullable', 'string'],
            "image" => ['nullable', 'file', 'image'],
            "status" => ['required', "in:0,1"],
        ], $rules);
    }

    public function listCategories(CategoriesDataTable $categoriesDataTable)
    {
        $categories = Category::where('parent_id')->get();
        return $categoriesDataTable->render("dashboard.pages.categories.categories-listing", ["parentCategories" => $categories]);
    }

    // public function showCreateForm(Request $request)
    // {
    //     return view('dashboard.pages.categories.category-form');
    // }

    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->categoryValidationRules())->validate();

        $category = new Category();

        foreach ($data["title"] as  $title) {
            $category->setTranslation('title', $title['language'], $title["translation"]);
        }
        $category->parent_id = $data['parent_id'] ?? null;
        $category->status = $data['status'];
        $category->slug = $data['slug'] ?? null;
        $category->save();
        if (isset($data['image'])) {
            $category->addMediaFromRequest('image')->toMediaCollection('category-image');
        }

        return back()->with('success', __("new record added successfully"));
    }


    public function showUpdateForm(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id')->get();

        return view('dashboard.pages.categories.categories-update', ["parentCategories" => $categories, 'category' => $category]);
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
        $category->parent_id = $data['parent_id'] ?? null;
        $category->slug = $data['slug'] ?? null;
        if (isset($data['image'])) {
            $category->image()?->delete();
            $category->addMediaFromRequest('image')->toMediaCollection('category-image');
        }
        $category->save();

        return (isset($data['toList']) ? redirect(route('categories')) : back()->with('success', __("record updated successfully")));
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->image()?->delete();
        $res = $category->delete();

        if ($res > 0) {
            return back()->with('success', __("record deleted successfully"));
        } else {
            return back()->with('error', __("something went wrong! please try again"));
        }
    }

}
