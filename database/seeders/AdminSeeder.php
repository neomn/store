<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            'userName'=>'Neo',
            'FirstName'=>'Neo',
            'lastName'=>'Mn',
            'phoneNumber'=>'Mn',
            'email'=>'neomn110@gmail.com',
            'password'=>Hash::make('nopassneeded110'),
            'role'=>'superUser',
        ];
        DB::table('admins')->insert($admins);
    }
}
