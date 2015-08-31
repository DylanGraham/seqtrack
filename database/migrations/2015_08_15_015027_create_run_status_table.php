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

        DB::table('run_status')->insert(
            array(
                array("status"=>"Run built",  "default"=>true,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("status"=>"Run succeeded",  "default"=>false,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("status"=>"Run failed",  "default"=>false,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())
            ));
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
