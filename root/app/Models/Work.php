<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    // テーブル名を決める
    protected $table = 'works';

    // 可変項目(カラム)
    protected $fillable =
    [
        'user_id',
        'work_content',
        'work_start_time',
        'work_end_time',
        'date',
        'status_id'
    ];
}
