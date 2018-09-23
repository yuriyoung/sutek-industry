<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('属性名');
            $table->string('value')->comment('属性值');
            $table->string('slug')->comment('标识');
            $table->string('icon')->nullable()->comment('图标');
            $table->integer('views')->default(0)->comment('查看量');
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
        Schema::dropIfExists('specs');
    }
}
