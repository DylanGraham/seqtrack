<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateI5IndexSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i5_index_set', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('name', 30);

            $table->timestamps();
        });

        Schema::table('i5_index_set', function (Blueprint $table) {
            $table->primary('id');
            $table->unique('name');
        });
        DB::table('i5_index_set')->insert(
            array(
                array("id"=>"3",  "name"=>"Illumina Nextera"),
                array("id"=>"4",  "name"=>"Illumina NexteraXT"),
                array("id"=>"5",  "name"=>"Illumina RNA HT"),
                array("id"=>"9",  "name"=>"In house dual index")
            ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('i5_index_set');
    }
}
