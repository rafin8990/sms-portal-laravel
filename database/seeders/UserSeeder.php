<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = new User();
        $users->user_name="Admin";
        $users->email= "admin@gmail.com";
        $users->password= Hash::make("12345");
        $users->address="Dhaka Bangladesh";
        $users->role="admin";
        $users->mobile="01701297556";
        $users->save();

    }
}
