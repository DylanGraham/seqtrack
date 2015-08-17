<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instrument_id')->unsigned();
            $table->integer('iem_file_version')->nullable();
            $table->string('user_id',4);
            $table->string('experiment_name',255)->nullable();
            $table->date('date')->nullable();;
            $table->string('work_flow',255);
            $table->string('application',255);
            $table->string('assay',255);
            $table->string('description',255)->nullable();
            $table->string('chemistry',255);
            $table->integer('read1');
            $table->integer('read2')->nullable();
            $table->boolean('single_double');
            $table->string('flow_cell_id',255);
            $table->boolean('run_success')->nullable();
            $table->integer('adaptor_id')->unsigned();

            //  $table->primary('Id');
            $table->foreign('adaptor_id')->references('id')->on('adaptor');
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
        Schema::drop('run');
    }
}
