<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Transportation_expensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scheduled_date = new DateTime();
        for ($i = 0; $i < 60; $i++) {
            DB::table('transportation_expenses')->insert([
                'user_id' => 1,
                'price' => 600,
                'date' => $scheduled_date-> modify('+1day')->format('Y-m-d'),
                'section_from' => '石神井公園',
                'section_to' => '池袋',
                'cost_from' => 'お台場',
                'cost_to' => '池袋',
                'created_at' => now(),
            ]);
        }
    }
}
