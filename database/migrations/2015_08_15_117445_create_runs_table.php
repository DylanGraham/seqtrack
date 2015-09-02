<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_group_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('instrument_id')->unsigned();
            $table->integer('iem_file_version')->unsigned();

            $table->string('experiment_name', 120);
            $table->date('run_date');
            $table->integer('work_flow_id')->unsigned();
            $table->integer('application_id')->unsigned();
            $table->integer('assay_id')->unsigned();

            $table->string('description', 120)->nullable();
            $table->integer('chemistry_id')->unsigned();

            $table->integer('read1');
            $table->integer('read2')->nullable();
            $table->boolean('single_double');
            $table->string('flow_cell', 10);
            $table->integer('adaptor_id')->unsigned();
            $table->integer('run_status_id')->unsigned();

            $table->foreign('project_group_id')->references('id')->on('project_group');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('instrument_id')->references('id')->on('instrument');
            $table->foreign('work_flow_id')->references('id')->on('work_flow');
            $table->foreign('application_id')->references('id')->on('application');
            $table->foreign('assay_id')->references('id')->on('assay');
            $table->foreign('chemistry_id')->references('id')->on('chemistry');
            $table->foreign('adaptor_id')->references('id')->on('adaptor');
            $table->foreign('run_status_id')->references('id')->on('run_status');
            $table->foreign('iem_file_version')->references('id')->on('iem_file_version');
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
        Schema::drop('runs');
    }
}
