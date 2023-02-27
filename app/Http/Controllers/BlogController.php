<?php

namespace App\Http\Controllers;

use App\DataTables\BlogDataTable;
use App\Models\Agent;
use App\Models\Article;
use App\Models\Category;
use App\Models\Definition;
use App\Models\Property;
use App\Models\PropertyFeatures;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{


    public function validationRules($rules = [])
    {
        return array_merge([
            "title" => ['required', "string"],
            "meta_title" => ['required', "string"],
            "meta_description" => ['nullable', "string"],
            "date" => ['required', "string"],
            "language" => ['required', "string", Rule::in(config('app.supported_locales'))],
            "status" => ['required', "string"],
            "featured" => ['nullable', "in:0,1"],
            "content" => ['required', "string"],
            "agent_id" => ['required', "exists:agents,id"],
            "photo" => ['required_if:id,null', "file"],
            "banner" => ['nullable', "string"],
        ], $rules);
    }


    public function index(BlogDataTable $blogDataTable)
    {
        return $blogDataTable->render("dashboard.pages.blog.blog-listing");
    }


    public function showForm(Request $request, $id = null)
    {
        $agents = Agent::select('id', 'name', 'surname')->where('status', 1)->get();
        $article = null;
        if ($id) {
            $article = Article::find($id);
        }
        return view('dashboard.pages.blog.article-form', [
            "article" => $article,
            "agents" => $agents,
        ]);
    }


    public function create(Request $request)
    {
        $data = $request->all();

        Validator::make($data, $this->validationRules())->validate();

        $photo_path = $request->file('photo')?->store('blog');

        $article = Article::create([
            'title' => $data['title'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'] ?? null,
            'date' => $data['date'],
            'language' => $data['language'],
            'status' => $data['status'],
            'featured' => $data['featured'] ?? 0,
            'content' => $data['content'],
            'agent_id' => $data['agent_id'],
            'photo' => $photo_path,
            'banner' => $data['banner'] ?? null,
        ]);

        return (isset($data['toList']) ? redirect(route('blogs')) : back())->with('success', __("new record added successfully"));
    }


    public function update(Request $request)
    {
        $data = $request->all();

        Validator::make($data, $this->validationRules([
            'id' => ['required', 'exists:articles']
        ]))->validate();

        $photo_path = null;
        if ($request->has('photo')) {
            $photo_path = $request->file('photo')?->store('blog');
        }

        $article = Article::find($data['id']);
        $article->update([
            'title' => $data['title'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'] ?? null,
            'date' => $data['date'],
            'language' => $data['language'],
            'status' => $data['status'],
            'featured' => $data['featured'] ?? 0,
            'content' => $data['content'],
            'agent_id' => $data['agent_id'],
            'photo' => $photo_path ?? $article->photo,
            'banner' => $data['banner'] ?? null,
        ]);

        return (isset($data['toList']) ? redirect(route('blogs')) : back())->with('success', __("record updated successfully"));
    }


    public function delete($id)
    {
        $article = Article::findOrFail($id);
        if (Storage::exists($article->photo)) {
            Storage::delete($article->photo);
        }
        $res = $article->delete();

        if ($res > 0) {
            return back()->with('success', __("record deleted successfully"));
        } else {
            return back()->with('error', __("something went wrong! please try again"));
        }
    }

    public function showBlog()
    {
        $articles = Article::where('status', 1)->paginate(8);

        $definitions = Definition::getActiveByType();
        $featuresByGroup = PropertyFeatures::getFeaturesByGroup($definitions['feature'] ?? []);
        $featuredProperties = Property::getActiveFeatured();
        $categories = Category::select('id', 'title')->where('status', 1)->with('properties')->whereHas('properties')->get();

        return view('frontpage.pages.blog', [
            'articles' =>  $articles,
            "propertyType" => $definitions['property_type'] ?? [],
            "buildingAge" => $definitions['building_age'] ?? [],
            "categories" => $categories,
            "features" => $featuresByGroup,
            "featuredProperties" => $featuredProperties,
        ]);
    }

    public function showArticle($id)
    {
        $article = Article::where('status', 1)->findOrFail($id);
        $recentArticles = Article::where('status', 1)->whereNot('id', $article->id)->orderBy('date', 'desc')->limit(2)->get();

        $definitions = Definition::getActiveByType();
        $featuresByGroup = PropertyFeatures::getFeaturesByGroup($definitions['feature'] ?? []);
        $featuredProperties = Property::getActiveFeatured();
        $categories = Category::select('id', 'title')->where('status', 1)->with('properties')->whereHas('properties')->get();


        return view('frontpage.pages.article', [
            'article' =>  $article,
            'recentArticles' =>  $recentArticles,
            "propertyType" => $definitions['property_type'] ?? [],
            "buildingAge" => $definitions['building_age'] ?? [],
            "categories" => $categories,
            "features" => $featuresByGroup,
            "featuredProperties" => $featuredProperties,
        ]);
    }
}
