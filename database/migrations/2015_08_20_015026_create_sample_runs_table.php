<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSampleRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample_runs', function (Blueprint $table) {
            $table->integer('run_id')->unsigned();
            $table->integer('sample_id')->unsigned();
            $table->timestamps();

            $table->foreign('run_id')->references('id')->on('runs');
            $table->foreign('sample_id')->references('id')->on('samples');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sample_runs');
    }
}
