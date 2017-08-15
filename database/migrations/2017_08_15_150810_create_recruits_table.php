<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruits', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title')->comment('採用タイトル');
            $table->string('title_en')->comment('採用タイトル(英語)');
            $table->string('title_ch')->comment('採用タイトル(中国語)');
            $table->text('body')->comment('採用詳細');
            $table->text('body_en')->comment('採用詳細(英語)');
            $table->text('body_ch')->comment('採用詳細(中国語)');
            $table->unsignedInteger('order')->comment('表示順');
            $table->dateTime('open_date')->nullable()->comment('公開開始日');
            $table->dateTime('close_date')->nullable()->comment('公開終了日');
            $table->dateTime('created_at');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruits');
    }
}
