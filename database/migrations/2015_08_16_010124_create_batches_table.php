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
            $table->string('batch',255)->unique();
            $table->float('concentration');
            $table->float('volume');
            $table->integer('tube_bar_code');
            $table->integer('tube_location')->nullable();
            $table->integer('lanes_required')->nullable();
            $table->string('user_id',4);
            $table->float('ave_insert_from_tape_station')->nullable();
            $table->string('charge_code',20);
            $table->timestamps();

//            $table->unique('batch');
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
