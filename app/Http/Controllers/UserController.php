<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    public function userValidationRules($rules = [])
    {
        return array_merge([
            "name" => ['required', 'string'],
            "surname" => ['required', 'string'],
            "username" => ['required', 'string', 'regex:/\w*$/', 'unique:users,username,' . request()->id],
            "status" => ['nullable', "in:0,1"],
            "email" => ['required', 'email', 'string', 'unique:users,email,' . request()->id],
            "password" => ['required', 'string', 'confirmed']
        ], $rules);
    }

    public function listUsers(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render("dashboard.pages.users.users-listing");
    }


    public function showCreateForm(Request $request)
    {
        return view('dashboard.pages.users.user-form');
    }

    public function storeUser(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->userValidationRules())->validate();

        User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 1,
        ]);

        return (isset($data['toList']) ? redirect(route('users')) : back()->with('success', __("new record added successfully")));
    }


    public function showUpdateForm(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.pages.users.user-form', ['user' => $user]);
    }

    public function UpdateUser(Request $request)
    {
        $data = $request->all();
        Validator::make($data, $this->userValidationRules([
            "id" => ['required', 'exists:users'],
            "password" => ['nullable', 'string', 'confirmed'],
            "status" => ['required', "in:0,1"],
        ]))->validate();

        $user = User::findOrFail($data['id']);
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->username = $data['username'];
        $user->email = $data['email'];
        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->status = $data['status'];
        $user->save();

        return (isset($data['toList']) ? redirect(route('users')) : back()->with('success', __("record updated successfully")));
    }

    public function deleteAccount($id)
    {
        $res = User::findOrFail($id)->delete();

        if ($res > 0) {
            return back()->with('success', __("record deleted successfully"));
        } else {
            return back()->with('error', __("something went wrong! please try again"));
        }
    }
}
