<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {

            $table->integer('batch_id')->unsigned();
            $table->integer('project_group_id')->unsigned();

            $table->increments('id');
            $table->string('sample_id',120);
            $table->string('plate',120)->nullable();
            $table->string('well',120)->nullable();

            $table->integer('i7_index_id')->unsigned();
            $table->integer('i5_index_id')->unsigned()->nullable();

            $table->string('description',120);
            $table->integer('runs_remaining');
            $table->integer('instrumnet_lane');

            $table->foreign('project_group_id')->references('id')->on('project_group');
            $table->foreign('batch_id')->references('id')->on('batches');

            $table->foreign('i7_index_id')->references('id')->on('i7_index');
            $table->foreign('i5_index_id')->references('id')->on('i5_index');

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
        Schema::drop('samples');
    }
}
