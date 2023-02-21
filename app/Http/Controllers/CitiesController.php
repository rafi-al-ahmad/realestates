<?php

namespace App\Http\Controllers;

use App\DataTables\CitiesDataTable;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CitiesController extends Controller
{

    public function CityValidationRules($rules = [])
    {
        return array_merge([
            "name" => ['required', 'string'],
            "image" => ['nullable', 'file', 'image'],
            "status" => ['required', "in:0,1"],
        ], $rules);
    }

    public function listCities(CitiesDataTable $citiesDataTable)
    {
        return $citiesDataTable->render("dashboard.pages.cities.cities-listing");
    }

    // public function showCreateForm(Request $request)
    // {
    //     return view('dashboard.pages.cities.city-form');
    // }

    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->cityValidationRules())->validate();

        $city = new City();
        $city->name = $data['name'];
        $city->status = $data['status'];
        $city->code = $data['code'] ?? null;
        $city->save();
        if (isset($data['image'])) {
            $city->addMediaFromRequest('image')->toMediaCollection('city-image');
        }

        return back()->with('success', __("new record added successfully"));
    }


    public function showUpdateForm(Request $request, $id)
    {
        $city = City::findOrFail($id);
        return view('dashboard.pages.cities.cities-update', ['city' => $city]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->cityValidationRules([
            "id" => ['required', 'exists:cities'],
        ]))->validate();

        $city = City::findOrFail($data['id']);

        $city->name = $data['name'];
        $city->status = $data['status'];
        $city->code = $data['code'] ?? null;
        if (isset($data['image'])) {
            $city->image()?->delete();
            $city->addMediaFromRequest('image')->toMediaCollection('city-image');
        }
        $city->save();

        return (isset($data['toList']) ? redirect(route('cities')) : back()->with('success', __("record updated successfully")));
    }

    public function delete($id)
    {
        $city = City::findOrFail($id);
        $city->image()?->delete();
        $res = $city->delete();

        if ($res > 0) {
            return back()->with('success', __("record deleted successfully"));
        } else {
            return back()->with('error', __("something went wrong! please try again"));
        }
    }

}
