<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                "user_id" => "3",
                "product_id" => "1",
                "title" => "Loved the product",
                "description" => "I loved this product. Would like more of it.",
                "rating" => 5,
                "reviewed_at" => Carbon::now()
            ],
            [
                "user_id" => "2",
                "product_id" => "1",
                "title" => "Loved this product",
                "description" => "I loved this product. Get me more of it.",
                "rating" => 4,
                "reviewed_at" => Carbon::now()
            ]
        ]);
    }
}
