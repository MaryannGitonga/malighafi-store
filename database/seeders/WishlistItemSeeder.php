<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wishlist_items')->insert(array(
            [
                'user_id' => 3,
                'product_id' => 1,
                'quantity' => 3
            ],
            [
                'user_id' => 3,
                'product_id' => 2,
                'quantity' => 1
            ],
        ));
    }
}
