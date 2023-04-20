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
        Schema::create('absences', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->time('absence_date')->unique()->comment('対象日');
            $table->boolean('half_absence')->nullable(true)->comment('半休');
            $table->integer('status_id')->comment('ステータス');
            $table->string('absence_reason',255)->comment('取得理由');
            $table->string('comment',255)->nullable(true)->comment('総務コメント');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absences');
    }
};
