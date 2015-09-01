<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class CreateRunStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status',20);
            $table->boolean('default');
            $table->timestamps();

            //$table->primary('Id');
            $table->unique('status');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('run_status');
    }
}
