<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make('admin123'),
                "address" => "Viet Nam, Giang Vo",
                "phone" => "0855662199",
                "isAdmin" => "1",
                "created_at" => "2021-10-14 17:22:36",
                "updated_at" => "2021-10-14 17:22:36"
            ],
        ]);
    }
}
