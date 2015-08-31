<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class CreateChemistryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemistry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chemistry',15);
            $table->boolean('default');
            $table->timestamps();

            //$table->primary('Id');
            $table->unique('chemistry');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chemistry');
    }
}
