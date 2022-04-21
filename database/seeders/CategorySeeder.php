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
        $categories = [
            [
                'id' => 1 ,
                'queriedCategory' => 'Electronics And Robotics',
                'parent_id' => null,
            ],
            [
                'id'=> 2,
                'queriedCategory' => 'Other',
                'parent_id' => null ,
            ],
            [
                'id' => 11,
                'queriedCategory' => 'MicroControllers and Processors',
                'parent_id' => 1
            ],
            [
                'id' => 111,
                'queriedCategory' => 'Arduino Family',
                'parent_id' => 11
            ],
            [
                'id' => 112,
                'queriedCategory' => 'Raspberry Family',
                'parent_id' => 11
            ],
            [
                'id' => 113,
                'queriedCategory' => 'ESP Family',
                'parent_id' => 11
            ],
        ];
        DB::table('allCategories')->insert($categories);
    }
}
