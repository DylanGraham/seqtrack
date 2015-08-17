<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createi5IndexTable extends Migration
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
            $table->integer('i5_index_group_id')->unsigned();
            $table->string('index', 50);
            $table->string('sequence', 20);

            $table->timestamps();

        });
        Schema::table('i5_index', function (Blueprint $table) {
            $table->foreign('i5_index_group_id')->references('id')->on('i5_index_group');
            $table->unique('index');
            $table->unique('sequence');

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
