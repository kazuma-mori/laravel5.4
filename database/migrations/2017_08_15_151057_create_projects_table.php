<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('project_category_id')->nullable()->comment('カテゴリID');
            $table->string('name')->comment('プロジェクト名');
            $table->string('name_en')->comment('プロジェクト名(英語)');
            $table->string('name_ch')->comment('プロジェクト名(中国語)');
            $table->text('body')->comment('プロジェクト詳細');
            $table->text('body_en')->comment('プロジェクト詳細(英語)');
            $table->text('body_ch')->comment('プロジェクト詳細(中国語)');
            $table->string('access')->nullable()->comment('アクセス情報');
            $table->string('access_en')->nullable()->comment('アクセス情報(英語)');
            $table->string('access_ch')->nullable()->comment('アクセス情報(中国語)');
            $table->string('tel', 32)->nullable()->comment('電話番号');
            $table->date('open_date')->nullable()->comment('オープン日');
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
        Schema::dropIfExists('projects');
    }
}
