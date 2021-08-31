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

        ));
    }
}
