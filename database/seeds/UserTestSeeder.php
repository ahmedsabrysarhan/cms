<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create(
        [
            'name' => 'ahmed',
            'email' => 'ahmed@ahmed.com',
            'role' =>'admin',
            'password' => Hash::make('123123'),
        ],
        // [
        // 'name' => 'zaki',
        // 'email' => 'zaki@zaki.com',
        // 'password' => Hash::make('123123'),
        // ],
        // [
        // 'name' => 'ali',
        // 'email' => 'ali@ali.com',
        // 'role' =>'admin',
        // 'password' => Hash::make('123123'),
        // ],
        
    );

    }
}
