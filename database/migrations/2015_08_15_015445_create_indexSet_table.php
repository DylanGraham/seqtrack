<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_set', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('name', 30);

            $table->timestamps();

            $table->primary('id');
            $table->unique('name');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('index_set');
    }
}
