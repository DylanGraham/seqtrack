<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateI7IndexGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i7_index_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);

            $table->timestamps();

          //  $table->primary('Id');
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
        Schema::drop('i7_index_group');
    }
}
