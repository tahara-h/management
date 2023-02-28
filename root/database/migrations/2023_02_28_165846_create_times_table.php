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
        Schema::create('times', function (Blueprint $table) {
            //以下は保留なんかIDなのにVARCHRだったり、型すらなかったりで自分で考えた方が良さそう
            //しかし考えてやった方がいいのか従った方がいいのか不明なため報告会で確認。
            //先に優先して形にする！
            $table->id()->comment('ID');
            $table->string('user_id')->comment('ソートID');
            $table->string('minutes')->comment('分');
            $table->timestamp('created_at')->comment('作成日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('times');
    }
};
