<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            [
                "user_id" => "1",
                "product_id" => "1"
            ],
            [
                "user_id" => "1",
                "product_id" => "2",
            ],
            [
                "user_id" => "2",
                "product_id" => "1",
            ]

        ]);
    }
}
