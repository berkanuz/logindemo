<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users = [
            [
                'name' => 'Berkan',
                'email' => 'berkan@berkan.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'ozan',
                'email' => 'ozan@ozan.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'deneme',
                'email' => 'deneme@deneme.com',
                'password' => Hash::make('12345678')
            ],            
        ];

        foreach ($users as $user) {
            User::insert($user);
        }
    }
}
