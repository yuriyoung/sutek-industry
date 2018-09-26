<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->index();
            $table->string('diameter')->nullable()->comment('半径');
            $table->string('flute_length')->nullable()->comment('槽长');
            $table->string('shank_diameter')->nullable()->comment('柄长');
            $table->string('overall_length')->nullable()->comment('总长');
            $table->string('equivalence')->nullable()->comment('摩尔量');
            $table->string('flutes')->nullable()->comment('槽数');
            $table->string('square_size')->nullable()->comment('方形大小');
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
        Schema::dropIfExists('product_size');
    }
}
