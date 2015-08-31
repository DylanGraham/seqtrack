<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class CreateProjectGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',20);

            $table->timestamps();

           // $table->primary('Id');
            $table->unique('name');
        });

        DB::table('project_group')->insert(
            array(
                array("name"=> "ABALONE",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "AQUACULTURE",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "BEEF",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "CEREALS",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "DAIRY",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "DAS",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "ENVIRO",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "GENOMES",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "GRAINS",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "MCOD",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "METABOLOMICS",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "METAGEN",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "NEMATODE",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "PASTURE",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "PATHOGENS",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "PIG",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "PROTEOMICS",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "SALMON",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "SEQEDIT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "SHEEP",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "SOIL",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "STUDENTS",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "TREES",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("name"=> "VISITORS",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())
            ));

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_group');
    }
}
