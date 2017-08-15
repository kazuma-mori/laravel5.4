<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_categories', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('main_project_id')->nullable()->comment('メインプロジェクトID');
            $table->string('name')->nullable()->comment('カテゴリ名');
            $table->string('name_en')->nullable()->comment('カテゴリ名(英語)');
            $table->string('name_ch')->nullable()->comment('カテゴリ名(中国語)');
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
        Schema::dropIfExists('project_categories');
    }
}
