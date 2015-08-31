<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class CreateInstrumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrument', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->timestamps();

            // $table->primary('Id');
            $table->unique('name');

        });
        DB::table('instrument')->insert(
            array(
                array("name" => "M01054"),
                array("name" => "M01697"),
                array("name" => "M03633"),
                array("name" => "J00108"),
                array("name" => "J00119"),
                array("name" => "NS500295"),
                array("name" => "C00103")
            ));
    }


        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public
        function down()
        {
            Schema::drop('instrument');
        }
}
