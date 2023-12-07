<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdmin = [
            [
                "name" => "Admin",
                "email" => "admin@cf.com",
                "password" => Hash::make('admin1234'),
                "created_at" => now(),
            ]
        ];

        DB::table("users")->insert($userAdmin);
    }
}
