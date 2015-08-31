<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexi7Table extends Migration
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
            $table->integer('index_set_id')->unsigned();
            $table->string('index', 16);
            $table->string('sequence', 16);

            $table->foreign('index_set_id')->references('id')->on('index_set');


            $table->timestamps();
        });
        DB::table('i7_index')->insert(
            array(



            ));

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
