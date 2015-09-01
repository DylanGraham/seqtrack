<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InstrumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instrument')->insert(
            array(
                array("name" => "M01054", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("name" => "M01697", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("name" => "M03633", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("name" => "J00108", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("name" => "J00119", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("name" => "NS500295", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("name" => "C00103", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
            ));
    }
}
