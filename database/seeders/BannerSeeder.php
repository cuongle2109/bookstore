<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'name' => 'banner1',
                'photo' => '1.jpg',
            ],
            [
                'name' => 'banner2',
                'photo' => '2.jpg',
            ],
            [
                'name' => 'banner3',
                'photo' => '3.jpg',
            ],
            [
                'name' => 'banner4',
                'photo' => '4.jpg',
            ],
            [
                'name' => 'banner5',
                'photo' => '5.jpg',
            ],
            [
                'name' => 'banner6',
                'photo' => '6.jpg',
            ],
            [
                'name' => 'banner7',
                'photo' => '7.jpg',
            ],
            [
                'name' => 'banner8',
                'photo' => '8.jpg',
            ],
            [
                'name' => 'banner9',
                'photo' => '9.jpg',
            ],
            [
                'name' => 'banner10',
                'photo' => '10.jpg',
            ],
        ]);
    }
}
