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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('last_name')->comment('名字');
            $table->string('first_name',100)->comment('名前');
            $table->string('last_name_kana',)->comment('名字(ふりがな)');
            $table->string('first_name_kana',)->comment('名前(ふりがな)');
            $table->integer('role_id')->comment('権限')->default(1);
            $table->string('prefecture')->comment('都道府県');
            $table->string('address1',255)->nullable(true)->comment('市区町村・番地');
            $table->string('address2',255)->nullable(true)->comment('構造物名・部屋番号');
            //入力されたメールアドレスが重複してないか確認
            $table->string('email',255)->unique()->comment('メールアドレス');
            $table->string('password',100)->comment('パスワード');
            $table->rememberToken("remember_token",255)->comment('リメンバートークン');
            $table->date('join_date')->comment('入社日');
            $table->timestamp('created_at')->comment('作成日時');
            $table->timestamp('updated_at')->comment('更新日時');
            $table->softDeletes()->comment('論理削除');
        });
    }

    /**
     *
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
