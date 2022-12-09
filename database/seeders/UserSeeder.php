<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('users')->insert([
            ['name' => 'gary', 
            'email' => 'gary@gary.com', 
            'role_id' => '1', 
            'password' => Hash::make('gary@gary.com')], 
            ['name' => 'member', 
            'email' => 'member@member.com', 
            'role_id' => '2', 
            'password' => Hash::make('member@member.com')], 
            ['name' => 'nexa', 
            'email' => 'nexa@nexa.com', 
            'role_id' => '3', 
            'password' => Hash::make('nexa@nexa.com')], 
         ]);
    }
}
