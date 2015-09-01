<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RunStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('run_status')->insert(
            array(
                array("status"=>"Run built",  "default"=>true,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("status"=>"Run succeeded",  "default"=>false,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("status"=>"Run failed",  "default"=>false,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())
            ));
    }
}
