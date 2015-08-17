<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample', function (Blueprint $table) {
            $table->string('id',255);
            $table->string('name',255);
            $table->integer('plate')->nullable();
            $table->integer('column')->nullable();
            $table->string('row',1)->nullable();
            $table->integer('lane')->nullable();


            $table->integer('basc_project_group_id')->unsigned();
            $table->integer('batch_id')->unsigned();
            $table->integer('run_id')->nullable()->unsigned();
            $table->integer('i7_index_id')->unsigned();
            $table->integer('i5_index_id')->unsigned()->nullable();


           // $table->primary('Id');
            $table->foreign('basc_project_group_id')->references('id')->on('basc_project_group');
            $table->foreign('batch_id')->references('id')->on('batch');
            $table->foreign('run_id')->references('id')->on('run');
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
        Schema::drop('sample');
    }
}
