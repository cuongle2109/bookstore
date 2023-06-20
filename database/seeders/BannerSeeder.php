<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 16; $i++) {
            Banner::query()->create(
                [
                    'name' => 'banner-'.$i,
                    'photo' => 'book-'.$i.'.jpg',
                ],
            );
        }
    }
}
