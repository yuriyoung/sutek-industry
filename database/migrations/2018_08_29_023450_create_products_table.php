<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable()->comment('分类');
            $table->string('code', 32)->nullable()->comment('内部编号');
            $table->string('title')->comment('标题');
            $table->string('slug')->comment('标识');
            $table->text('description')->comment('描述');
            $table->string('images')->comment('图像');
            $table->integer('views')->default('0')->comment('浏览数');
            $table->integer('likes')->default('0')->comment('点赞数');
            $table->boolean('status')->default('1')->comment('状态');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
