<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('users_id')->unsigned();
            $table->string('batch_name',60);
            $table->float('concentration');
            $table->float('volume');
            $table->string('tube_bar_code',60);
            $table->string('tube_location',60);

            $table->float('tape_station_length');
            $table->string('charge_code',17);
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->unique('batch_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('batches');
    }
}
