<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateI7IndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i7_index', function (Blueprint $table) {
            $table->increments('id');
            $table->string('index', 50);
            $table->string('sequence', 20);
            $table->integer('index_set_id')->unsigned();
            $table->foreign('index_set_id')->references('id')->on('index_set');
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
        Schema::drop('i7_index');
    }
}
