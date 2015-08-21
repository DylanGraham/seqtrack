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
            $table->integer('iem_file_version')->nullable();
//            $table->string('user_id'); // Should be foreign key
            $table->string('experiment_name',255)->nullable();
            $table->date('date')->nullable();;
            $table->string('work_flow',255);
            $table->string('application',255);
            $table->string('assay',255);
            $table->string('description',255)->nullable();
            $table->string('chemistry',255);
            $table->integer('read1');
            $table->integer('read2')->nullable();
            $table->string('flow_cell_id',255);
            $table->boolean('run_success')->nullable();
            $table->integer('adaptor_id')->unsigned();
            $table->foreign('adaptor_id')->references('id')->on('adaptor');
            $table->integer('instrument_id')->unsigned();
            $table->foreign('instrument_id')->references('id')->on('instrument');
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
