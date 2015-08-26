<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdaptorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adaptor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value',50);
            $table->boolean('default');
            $table->timestamps();

            //$table->primary('Id');
            $table->unique('value');

        });

        DB::table('adaptor')->insert(
            array(
                'value' => 'CTGTCTCTTATACACATCT',
                'default' => true
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('adaptor');
    }
}
