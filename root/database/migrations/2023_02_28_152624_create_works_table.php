<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->integer('user_id')->comment('ユーザーID');
            $table->string('work_content',255)->comment('業務内容');
            $table->string('comment',255)->nullable(true)->comment('総務コメント');
            $table->date('date')->unique()->comment('日付');
            $table->time('work_start_time')->comment('出勤時間');
            $table->time('work_end_time')->comment('退勤時間');
            $table->time('break_time')->nullable(true)->comment('休憩時間');
            $table->integer('status_id')->comment('ステータス');
            $table->timestamp('created_at')->comment('作成日時');
            $table->timestamp('updated_at')->nullable(true)->comment('更新日時');
            $table->softDeletes()->comment('論理削除');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
};
