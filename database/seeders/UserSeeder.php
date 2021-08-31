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
                'mpesa_no' => '798568747'
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
                'mpesa_no' => '798568747'
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
                'mpesa_no' => '798568747'
            ],
            [
                'name' => 'Lynn Monroe',
                'email' => 'lynn.monroe@user.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::createFromFormat('Y-m-d H', '2020-05-21 22'),
                'kra_pin' => '08328H0812Y',
                'permit_no' => '7528376',
                'permit_upload_path' => 'permit-upload.pdf',
                'permit_approved' => true,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2020-05-21 22'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2020-05-21 22'),
                'mpesa_no' => '798568747'
            ],
            [
                'name' => 'Nicholas Kanyi',
                'email' => 'nick.kanyi@user.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::createFromFormat('Y-m-d H', '2020-05-21 22'),
                'kra_pin' => null,
                'permit_no' => null,
                'permit_upload_path' => null,
                'permit_approved' => false,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2020-05-21 22'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2020-05-21 22'),
                'mpesa_no' => '798568747'
            ],
            [
                'name' => 'Maryann',
                'email' => 'maryann.mwendwa@strahmore.edu',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::createFromFormat('Y-m-d H', '2020-05-21 22'),
                'kra_pin' => null,
                'permit_no' => null,
                'permit_upload_path' => null,
                'permit_approved' => false,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2020-05-21 22'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2020-05-21 22'),
                'mpesa_no' => '798568747'
            ],
            [
                'name' => 'Rita Baker',
                'email' => 'rita.baker@user.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::createFromFormat('Y-m-d H', '2019-05-21 22'),
                'kra_pin' => '90852Y08I',
                'permit_no' => '92049070',
                'permit_upload_path' => 'permit-upload.pdf',
                'permit_approved' => true,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2019-05-21 22'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2019-05-21 22'),
                'mpesa_no' => '798568747'
            ],
            [
                'name' => 'Vicky Monroe',
                'email' => 'vicky.monroe@user.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::createFromFormat('Y-m-d H', '2019-05-21 22'),
                'kra_pin' => '08368H0812Y',
                'permit_no' => '7520376',
                'permit_upload_path' => 'permit-upload.pdf',
                'permit_approved' => true,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2019-05-21 22'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2019-05-21 22'),
                'mpesa_no' => '798568747'
            ],

        ));
    }
}
