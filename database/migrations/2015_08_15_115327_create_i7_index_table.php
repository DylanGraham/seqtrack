<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createi7IndexTable extends Migration
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
            $table->integer('i7_index_group_id')->unsigned();
            $table->string('index',50);
            $table->string('sequence',20);


            //$table->primary('Id');
            $table->foreign('i7_index_group_id')->references('id')->on('i7_index_group');
            $table->unique('index');
            $table->unique('sequence');

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
