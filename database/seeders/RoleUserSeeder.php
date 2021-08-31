<?php

namespace Database\Seeders;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert(array(
            [
                'user_id' => 1,
                'role_id' => UserType::Administrator,
                'status' => AccountStatus::Active
            ],
            [
                'user_id' => 2,
                'role_id' => UserType::Buyer,
                'status' => AccountStatus::Active
            ],
            [
                'user_id' => 3,
                'role_id' => UserType::Buyer,
                'status' => AccountStatus::Active
            ],
            [
                'user_id' => 3,
                'role_id' => UserType::Seller,
                'status' => AccountStatus::Disabled
            ],
            [
                'user_id' => 4,
                'role_id' => UserType::Buyer,
                'status' => AccountStatus::Disabled
            ],
            [
                'user_id' => 4,
                'role_id' => UserType::Seller,
                'status' => AccountStatus::Active
            ],
            [
                'user_id' => 5,
                'role_id' => UserType::Buyer,
                'status' => AccountStatus::Active
            ],
            [
                'user_id' => 5,
                'role_id' => UserType::Seller,
                'status' => AccountStatus::Disabled
            ],
            [
                'user_id' => 6,
                'role_id' => UserType::Buyer,
                'status' => AccountStatus::Active
            ],
            [
                'user_id' => 6,
                'role_id' => UserType::Seller,
                'status' => AccountStatus::Disabled
            ],
            [
                'user_id' => 7,
                'role_id' => UserType::Buyer,
                'status' => AccountStatus::Active
            ],
            [
                'user_id' => 7,
                'role_id' => UserType::Seller,
                'status' => AccountStatus::Disabled
            ],
            [
                'user_id' => 8,
                'role_id' => UserType::Buyer,
                'status' => AccountStatus::Disabled
            ],
            [
                'user_id' => 8,
                'role_id' => UserType::Seller,
                'status' => AccountStatus::Active
            ],
        ));
    }
}
