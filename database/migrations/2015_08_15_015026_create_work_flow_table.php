<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class CreateWorkFlowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_flow', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value',15);
            $table->boolean('default');
            $table->timestamps();

            //$table->primary('Id');
            $table->unique('value');

        });

        DB::table('work_flow')->insert(
            array(
                array("value"=>"GenerateFASTQ",  "default"=>true,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("value"=>"Amplicon",  "default"=>false,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work_flow');
    }
}
