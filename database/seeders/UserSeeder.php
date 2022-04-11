<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
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
//        $faker=Factory::create();
//        for ($i=0;$i<30;$i++){
//            $value=[
//                'firstName'=>$faker->name(),
//                'lastName'=>$faker->lastName(),
//                'phoneNumber'=>$faker->phoneNumber(),
//                'email'=>$faker->email(),
//                'email_verified_at'=>$faker->dateTime(),
//                'password'=>$faker->password,
//            ];
//             DB::table('user')->insert($value);
//        }

        $faker = Factory::create();
        $value = [
            'first_name' => 'test',
            'last_name' => 'user',
            'phone_number' => '09178448254',
            'email' => 'testuser@test.com',
            'email_verified_at' => $faker->dateTime(),
            'password' => Hash::make('testtest123'),
        ];
        DB::table('users')->insert($value);

        User::factory()->count(200)->create();
    }
}
