<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('名称');
            $table->string('slug')->comment('标识');
            $table->string('description')->nullable()->comment('描述');
            $table->integer('sort')->default(0)->comment('排序');
            $table->integer('views')->default(0)->comment('查看量');
            $table->string('icon')->nullable()->comment('图标');
            $table->unsignedInteger('parent_id')->default(0)->comment('父分类');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
