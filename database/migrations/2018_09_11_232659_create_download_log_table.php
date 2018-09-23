<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('download_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->string('ip');
            $table->string('iso_code');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('state_name');
            $table->string('client');
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
        Schema::dropIfExists('download_log');
    }
}
