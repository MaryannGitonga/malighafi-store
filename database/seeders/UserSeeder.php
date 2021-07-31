<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            [
                'name' => 'Jane Doe',
                'email' => 'jane.doe@admin.com',
                'password' => Hash::make('JaneD0e_7'),
                'email_verified_at' => Carbon::now()
            ]
        ));
    }
}
