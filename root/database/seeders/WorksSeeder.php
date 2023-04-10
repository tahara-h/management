<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;

class WorksSeeder extends Seeder
{
    public function run()
    {
        // 今日の日付を引数に代入
        $scheduled_date = new DateTime();
        // 60個の出勤日を作成
        for ($i = 0; $i < 60; $i++) {
            DB::table('works')->insert([
                'user_id' => 1,
                'work_content' => '在宅ワーク',
                'date' => $scheduled_date-> modify('+1day')->format('Y-m-d'),
                'work_start_time' => '09:30:00',
                'work_end_time' => '18:30:00',
                'break_time' => '00:10:00',
                'status_id' => 1,
                'created_at' => now(),
            ]);
        }
    }
}