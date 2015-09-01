<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class CreateProjectGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',20);

            $table->timestamps();

           // $table->primary('Id');
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
        Schema::drop('project_group');
    }
}
