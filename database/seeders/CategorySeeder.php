<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
           [
            'category' => 'food'
           ],

           [
            'category' => 'chemicals'
           ],

           [
            'category' => 'natural extract'
           ],

           [
            'category' => 'metals'
           ]

       ]);
    }
}
