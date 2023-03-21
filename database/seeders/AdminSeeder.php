<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Alognon Carlos";
        $user->email = "carlos@gmail.com";
        $user->password = Hash::make("password");
        $user->user_type = "admin";
        $user->save();
    }
}
