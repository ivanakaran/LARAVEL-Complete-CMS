<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'ivanakaranfilova@hotmail.com')->get()->first();

        if (!$user) {
            User::create([
                'name' => 'Ivana Karanfilova',
                'email' => 'ivanakaranfilova@hotmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]);
        }
    }
}