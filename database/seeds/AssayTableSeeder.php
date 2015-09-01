<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AssayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assay')->insert(
            array(
                array("name" => "Nextera", "default" => true, "created_at" => Carbon::now(), "updated_at" => Carbon::now())
            ));
    }
}
