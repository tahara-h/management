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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->integer('user_id')->comment('申請したユーザーのID');
            $table->dateTime('date')->comment('日付');
            $table->string('price')->comment('備品価格');
            $table->string('content')->comment('備品内容');
            $table->integer('equipment_type_id')->comment('備品種類id');
            $table->dateTime('purchase_date')->comment('備品購入日');
            $table->timestamp('created_at')->comment('作成日時');
            $table->timestamp('updated_at')->comment('更新日時');
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
        Schema::dropIfExists('equipments');
    }
};
