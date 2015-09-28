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
            $table->integer('user_id')->unsigned();
            $table->string('batch_name', 60)->unique();
            $table->integer('project_group_id')->unsigned();
            $table->float('concentration');
            $table->float('volume');
            $table->string('tube_bar_code', 60);
            $table->string('tube_location', 60);

            $table->integer('tape_station_length');
            $table->string('charge_code', 17);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('project_group_id')->references('id')->on('project_group');
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
