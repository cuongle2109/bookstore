<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('payment_types')->insert([
               ['name' => "Thanh toán chuyển khoản"],
               ['name' => "Thanh toán khi nhận hàng"],
           ]);
    }
}
