<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
                array("name"=> "ABALONE"),
                array("name"=> "AQUACULTURE"),
                array("name"=> "BEEF"),
                array("name"=> "CEREALS"),
                array("name"=> "DAIRY"),
                array("name"=> "DAS"),
                array("name"=> "ENVIRO"),
                array("name"=> "GENOMES"),
                array("name"=> "GRAINS"),
                array("name"=> "MCOD"),
                array("name"=> "METABOLOMICS"),
                array("name"=> "METAGEN"),
                array("name"=> "NEMATODE"),
                array("name"=> "PASTURE"),
                array("name"=> "PATHOGENS"),
                array("name"=> "PIG"),
                array("name"=> "PROTEOMICS"),
                array("name"=> "SALMON"),
                array("name"=> "SEQEDIT"),
                array("name"=> "SHEEP"),
                array("name"=> "SOIL"),
                array("name"=> "STUDENTS"),
                array("name"=> "TREES"),
                array("name"=> "VISITORS")
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
