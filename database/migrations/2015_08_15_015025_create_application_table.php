<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->increments('id');
            $table->string('application',15);
            $table->boolean('default');
            $table->timestamps();

            $table->unique('application');

        });


        DB::table('application')->insert(
            array(
                array("application"=>"FASTQOnly",  "default"=>true,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())

            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('application');
    }
}
