<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
            'last_name' => '有村',
            'first_name' => '架純',
            'last_name_kana' => 'アリムラ',
            'first_name_kana' => 'カスミ',
            'role_id' => 1,
            'prefecture' => fake()->citySuffix(),
            'address1' => fake()->streetSuffix(),
            'address2' => fake()->buildingNumber(),
            'email' => 'root@root.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'join_date' => fake()->dateTime(),
            'created_at' => now(),
        ]);
    }
}
