<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBascProjectGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basc_project_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);

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
        Schema::drop('BASC_Project_Group');
    }
}
