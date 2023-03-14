<?php

namespace App\Http\Controllers;

use App\DataTables\TestimonialDataTable;
use App\DataTables\TestimonialsDataTable;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{

    public function validationRules($rules = [])
    {
        return array_merge([
            "title" => ['required', "string"],
            "subtitle" => ['required', "string"],
            "text" => ['required', "string"],
            'featured' => ['nullable', 'in:1,0'],
            "status" => ['required', "string", "in:1,0"],
        ], $rules);
    }

    public function index(TestimonialsDataTable $testimonialsDataTable)
    {
        return $testimonialsDataTable->render("dashboard.pages.testimonials.testimonials-listing");
    }


    public function showForm($id = null)
    {
        if ($id) {
            $testimonial = Testimonial::find($id);
            return view("dashboard.pages.testimonials.testimonial-form", ["testimonial" => $testimonial]);
        }
        return view("dashboard.pages.testimonials.testimonial-form");
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->validationRules())->validate();

        $testimonial = Testimonial::create([
            'title' => [App::currentLocale() => $data['title']],
            'subtitle' => [App::currentLocale() => $data['subtitle']],
            'text' => [App::currentLocale() => $data['text']],
            'status' => $data['status'],
            'featured' => $data['featured'] ?? 0,
        ]);

        return (isset($data['toList'])? redirect(route('testimonials')) : back())->with('success', __("new record added successfully"));
    }


    public function showUpdateForm($id, $locale = null)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($locale == null) {
            $locale = App::currentLocale();
        }
        $testimonial->setLocale($locale);

        return view("admin.pages.testimonials.update_testimonial", ['testimonial' => $testimonial, 'locale' => $locale]);
    }


    public function update(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->validationRules([
            "id" => ["required", "exists:testimonials"],
            'language' => ['required', 'max:2'],
        ]))->validate();

        $testimonial = Testimonial::find($data['id']);
        $testimonial->setTranslation('text', $data['language'], $data["text"]);
        $testimonial->setTranslation('title', $data['language'], $data["title"]);
        $testimonial->setTranslation('subtitle', $data['language'], $data["subtitle"]);
        $testimonial->status = $data['status'];
        $testimonial->featured = $data['featured'] ?? 0;
        $testimonial->save();

        return (isset($data['toList'])? redirect(route('testimonials')) : back())->with('success', __("record updated successfully"));
    }
    public function updateStatus(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            "ids" => ["required", "array"],
            "ids.*" => ["required", "exists:testimonials,id"],
            "status" => ["required", "in:1,0"]
        ])->validate();

        $res = Testimonial::whereIn('id', $data['ids'])->update(["status" => $data['status']]);

        return response([]);
    }


    public function updateFeaturedStatus(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            "ids" => ["required", "array"],
            "ids.*" => ["required", "exists:testimonials,id"],
            "featured" => ["required", "in:1,0"]
        ])->validate();

        $res = Testimonial::whereIn('id', $data['ids'])->update(["featured" => $data['featured']]);

        return response([]);
    }

    public function reorder(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            "orders" => ["required", "array"],
            "orders.*.id" => ["required", "exists:testimonials,id"],
            "orders.*.newOrder" => ["required"],
        ])->validate();


        $ids = [];
        $caseStatement = "CASE ";
        foreach ($data['orders'] as $val) {
            $ids[] = $val['id'];
            $caseStatement .= " WHEN id = " . $val['id'] . " THEN " . $val['newOrder'] . " ";
        }
        $caseStatement .= " END";

        $res = Testimonial::whereIn('id', $ids)->update([
            "order" => DB::raw($caseStatement)
        ]);

        if ($res > 0) {
            return response([]);
        } else {
            return response([], 400);
        }
    }


    public function delete(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            "ids" => ["required", "array"],
            "ids.*" => ["required", "exists:testimonials,id"],
        ])->validate();

        $res = Testimonial::whereIn('id', $data['ids'])->delete();

        if ($res > 0) {
            return response([]);
        } else {
            return response([], 400);
        }
    }

    public function deleteTranslation(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            "id" => ["required", "exists:testimonials"],
            'locale' => ['required', 'max:2'],
        ])->validate();

        if($data['locale'] == config('app.locale')) {
            return back()->withErrors("you can't delete the main language!");
        }

        $testimonials = Testimonial::find($data['id']);
        $testimonials->forgetTranslation('text', $data['locale']);
        $testimonials->forgetTranslation('title', $data['locale']);
        $testimonials->forgetTranslation('subtitle', $data['locale']);
        $testimonials->save();

        return redirect(route('testimonials'))->with('success', __("translation deleted successfully"));

    }
}
