<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@dasharathchand.gov.np',
                'password' => Hash::make('Nepal@123'),
                'email_verified_at' => Carbon::now(),
                'role' => 'admin',
                'remember_token' => 'Nepal@123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'ward_no' => '08'
            ],
        ]);
    }
}
