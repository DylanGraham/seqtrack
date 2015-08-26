<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateI7IndexSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i7_index_set', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('name', 30);

            $table->timestamps();

            $table->primary('id');
            $table->unique('name');
        });
        DB::table('i7_index_set')->insert(
            array(
                array("id"=>"1",  "name"=>"Agilent NEW"),
                array("id"=>"2",  "name"=>"Agilent OLD"),
                array("id"=>"3",  "name"=>"Illumina Nextera"),
                array("id"=>"4",  "name"=>"Illumina NexteraXT"),
                array("id"=>"5",  "name"=>"Illumina RNA HT"),
                array("id"=>"6",  "name"=>"Illumina RNA LT"),
                array("id"=>"7",  "name"=>"Illumina small RNA"),
                array("id"=>"8",  "name"=>"ILLUMINA TRUSEQ 12 SET"),
                array("id"=>"9",  "name"=>"In house dual index"),
                array("id"=>"10",  "name"=>"INHOUSE 24 SET"),
                array("id"=>"11",  "name"=>"NimbleGen Set")

            ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('i7_index_set');
    }
}
