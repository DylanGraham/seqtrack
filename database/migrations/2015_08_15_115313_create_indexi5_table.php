<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexi5Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i5_index', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('index_set_id')->unsigned();
            $table->string('index', 16);
            $table->string('sequence', 16);

            $table->timestamps();

        });
        Schema::table('i5_index', function (Blueprint $table) {
            $table->foreign('index_set_id')->references('id')->on('index_set');
            $table->unique('index');

        });;

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('i5_index');
    }
}
