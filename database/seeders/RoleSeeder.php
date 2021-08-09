<?php

namespace Database\Seeders;

use App\Enums\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            [
                'role' => UserType::Administrator
            ],
            [
                'role' => UserType::Seller
            ],
            [
                'role' => UserType::Buyer
            ]
        ));
    }
}
