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
        Schema::create('transportation_expenses', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->integer('user_id')->comment('ユーザーID');
            $table->integer('price')->comment('金額')->nullable(true);
            $table->date('date')->comment('日付')->nullable(true);
            $table->string('section_from',100)->comment('区間(行き)')->nullable(true);
            $table->string('section_to',100)->comment('区間(帰り)')->nullable(true);
            $table->string('cost_from',255)->comment('交通費(行き)')->nullable(true);
            $table->string('cost_to',255)->comment('交通費(帰り)')->nullable(true);
            $table->string('note',255)->comment('備考')->nullable(true);
            $table->timestamp('created_at')->comment('作成日時');
            $table->timestamp('updated_at')->comment('更新日時')->nullable(true);
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
        Schema::dropIfExists('transportation_expenses');
    }
};
