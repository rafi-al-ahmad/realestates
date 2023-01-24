<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "admin",
                "surname" => "admin",
                "username" => "admin",
                "email" => "admin@admin.com",
                "email_verified_at" => Carbon::now(),
                "password" => Hash::make(123),
            ]
        ];

        foreach ($users as $user) {
            User::firstOrCreate(["email" => $user['email'],], $user);
        }
    }
}
