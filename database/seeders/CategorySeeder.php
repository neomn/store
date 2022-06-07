<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            ['id' => 1 , 'category' => 'Electronics And Robotics', 'parent_id' => null,],
            ['id'=> 2, 'category' => 'Other', 'parent_id' => null ,],
            ['id' => 11, 'category' => 'MicroControllers and Processors', 'parent_id' => 1],
            ['id' => 12, 'category' => 'ElectroMotors', 'parent_id' => 1],
            ['id' => 121, 'category' => 'Brushless', 'parent_id' => 12],
            ['id' => 122, 'category' => 'DC Motors', 'parent_id' => 12],
            ['id' => 13, 'category' => 'Power Supplier', 'parent_id' => 1],
            ['id' => 14, 'category' => 'Batteries', 'parent_id' => 1],
            ['id' => 111, 'category' => 'Arduino Family', 'parent_id' => 11],
            ['id' => 112, 'category' => 'Raspberry Family', 'parent_id' => 11],
            ['id' => 113, 'category' => 'ESP Family', 'parent_id' => 11],
            ['id' => 21, 'category' => 'Tools', 'parent_id' => 2],
            ['id' => 22, 'category' => 'stuffs', 'parent_id' => 2],
        ];
        DB::table('categories')->insert($categories);

        $categoryImages = [
            ['category_id' => 1 ,'title' => 'Electronics And Robotics' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 2 ,'title' => 'Other' , 'url'=> '/storage/images/categories/other.jpg'],
            ['category_id' => 11 ,'title' => 'MicroControllers and Processors' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 12 ,'title' => 'Arduino Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 121 ,'title' => 'Raspberry Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 122 ,'title' => 'ESP Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 13 ,'title' => 'ESP Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 14 ,'title' => 'ESP Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 111 ,'title' => 'ESP Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 112 ,'title' => 'ESP Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 113 ,'title' => 'ESP Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 21 ,'title' => 'ESP Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
            ['category_id' => 22 ,'title' => 'ESP Family' , 'url'=> '/storage/images/categories/electronicsAndRobotics.jpg'],
        ];
        DB::table('images')->insert($categoryImages);
    }
}
