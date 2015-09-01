<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WorkFlowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_flow')->insert(
            array(
                array("value"=>"GenerateFASTQ",  "default"=>true,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("value"=>"Amplicon",  "default"=>false,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())
            ));
    }
}
