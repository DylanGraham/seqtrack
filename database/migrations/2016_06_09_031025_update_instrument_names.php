<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInstrumentNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::update("update instrument set name='MiSeq01' where name='M01054'");
        DB::update("update instrument set name='MiSeq02' where name='M03633'");
        DB::update("update instrument set name='MiSeq03' where name='M01697'");
    }
}