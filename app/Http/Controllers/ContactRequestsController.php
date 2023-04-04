<?php

namespace App\Http\Controllers;

use App\DataTables\ContactRequestsDataTable;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactRequestsController extends Controller
{
    public function validationRules($rules = [])
    {
        return array_merge([
            "name" => ['required', "string", "max:190"],
            "phone" => ['required', "string", "max:190"],
            "email" => ['required', "string", "max:190"],
            "subject" => ['required', "string", "max:190"],
            "message" => ['required', "string", "max:1000"],
        ], $rules);
    }


    public function index(ContactRequestsDataTable $contactRequestsDataTable)
    {
        return $contactRequestsDataTable->render("dashboard.pages.contact.contact-listing");
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->validationRules())->validate();

        $contactRequest = ContactRequest::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);

        return back()->with('success', __("new contact request added successfully"));
    }
}
