<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => "Sách giáo khoa"],
            ['name' => "Truyện tranh"],
            ['name' => "Sách tâm lý"],
            ['name' => "Sách kinh doanh"],
        ]);
    }
}
