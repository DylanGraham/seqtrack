<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
}
