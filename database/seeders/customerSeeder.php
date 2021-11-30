<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        for ($i=0;$i<30;$i++){
            $value=[
                'firstName'=>$faker->name(),
                'lastName'=>$faker->lastName(),
                'phoneNumber'=>$faker->phoneNumber(),
                'emailAddress'=>$faker->email(),
            ];
             DB::table('customer')->insert($value);
        }
    }
}
