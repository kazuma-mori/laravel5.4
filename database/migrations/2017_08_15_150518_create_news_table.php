<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title')->comment('トピックタイトル');
            $table->string('title_en')->comment('トピックタイトル(英語)');
            $table->string('title_ch')->comment('トピックタイトル(中国語)');
            $table->text('body')->comment('トピック詳細');
            $table->text('body_en')->comment('トピック詳細(英語)');
            $table->text('body_ch')->comment('トピック詳細(中国語)');
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
        Schema::dropIfExists('news');
    }
}
