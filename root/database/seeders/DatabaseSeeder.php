<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\MOdels\Work;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // テストデータの作成
        $this->call([
            WorksSeeder::class,
            Transportation_expensesSeeder::class,
            UserSeeder::class,
        ]);
        // ファクトリーも使ってみた
        User::factory(30)->create();
    }
}
