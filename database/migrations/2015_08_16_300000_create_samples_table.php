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
            $table->increments('id');
            $table->string('sample_id', 120);
            $table->string('plate', 120)->nullable();
            $table->integer('column')->nullable();
            $table->integer('lane')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('basc_group_id')->unsigned();
            $table->foreign('basc_group_id')->references('id')->on('basc_group');
            $table->integer('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->integer('run_id')->nullable()->unsigned();
            $table->foreign('run_id')->references('id')->on('run');
            $table->integer('i7_index_id')->unsigned();
            $table->integer('i5_index_id')->unsigned()->nullable();
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
