<?php

namespace Database\Seeders;

use App\Enums\ProductStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Timber',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'price' => 10000,
                'category_id' => 3,
                'unit_id' => 2,
                'seller_id' => 3,
                'path' => 'raw-material.jpg',
                'status' => ProductStatus::Pending
            ],
            [
                'name' => 'Wooden Logs',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'price' => 8000,
                'category_id' => 3,
                'unit_id' => 2,
                'seller_id' => 4,
                'path' => 'raw-material.jpg',
                'status' => ProductStatus::Pending
            ],
        ]);
    }
}
