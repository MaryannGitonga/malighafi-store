<?php

namespace Database\Seeders;

use App\Enums\InboxMessageStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InboxMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inbox_messages')->insert(array(
            [
                'title' => "Order is successful",
                'message' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                'user_id' => 3,
                'status' => InboxMessageStatus::Unread
            ],
            [
                'title' => "Order is successful",
                'message' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                'user_id' => 3,
                'status' => InboxMessageStatus::Read
            ],
        ));
    }
}
