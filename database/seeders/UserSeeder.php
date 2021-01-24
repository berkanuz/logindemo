<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

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
                'surname' => 'UZ',
                'email' => 'berkan@berkan.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'ozan',
                'surname' => 'yaldir',
                'email' => 'ozan@ozan.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'deneme',
                'surname' => 'deneme',
                'email' => 'deneme@deneme.com',
                'password' => Hash::make('12345678')
            ],            
        ];

        foreach ($users as $user) {
            User::insert($user);
        }
    }
}
