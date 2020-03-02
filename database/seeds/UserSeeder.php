<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "dev pluriza",
            "email" => "evertec@gmail.com",
            "password" => bcrypt('123456789'),
            "email_verified_at" => now(),
        ]);
    }
}