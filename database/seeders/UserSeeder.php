<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'mazin',
            'email' => 'mazin@gmail.com',
            'password' => Hash::make('123123123'),
            'role' =>  'admin',        
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
