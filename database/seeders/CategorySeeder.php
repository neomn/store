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
                'category' => 'Electronics And Robotics',
                'parent_id' => null,
            ],
            [
                'id'=> 2,
                'category' => 'Other',
                'parent_id' => null ,
            ],
            [
                'id' => 11,
                'category' => 'MicroControllers and Processors',
                'parent_id' => 1
            ],
            [
                'id' => 111,
                'category' => 'Arduino Family',
                'parent_id' => 11
            ],
            [
                'id' => 112,
                'category' => 'Raspberry Family',
                'parent_id' => 11
            ],
            [
                'id' => 113,
                'category' => 'ESP Family',
                'parent_id' => 11
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
