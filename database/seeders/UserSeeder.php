<?php

namespace Database\Seeders;

use App\Models\User;
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
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::now(),
                'kra_pin' => null,
                'permit_no' => null,
                'permit_upload_path' => null,
                'permit_approved' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'John Doe',
                'email' => 'john.doe@user.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::now(),
                'kra_pin' => null,
                'permit_no' => null,
                'permit_upload_path' => null,
                'permit_approved' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'George Baker',
                'email' => 'george.baker@user.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::now(),
                'kra_pin' => '90812Y08I',
                'permit_no' => '92049470',
                'permit_upload_path' => 'permit-upload.pdf',
                'permit_approved' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lynn Monroe',
                'email' => 'lynn.monroe@user.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::now(),
                'kra_pin' => '08328H0812Y',
                'permit_no' => '7528376',
                'permit_upload_path' => 'permit-upload.pdf',
                'permit_approved' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ));
    }
}
