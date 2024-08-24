<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        $name = 'inventory';
        $email = 'inventory@gmail.com';
        $role = 'Admin';
        $profile_image = 'please add a profile from your files';

        DB::table('users')->insert ([
            [
                'name' => $name,
                'email' => $email,
                'role_name' => $role,
                'password' => Hash::make('admin12345'),
                'remember_token' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
                'profile_image' => $profile_image,
            ],
        ]);
    }
}
