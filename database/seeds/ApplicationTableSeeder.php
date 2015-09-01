<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application')->insert(
            array(
                array("application"=>"FASTQOnly",  "default"=>true,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())

            ));
    }
}
