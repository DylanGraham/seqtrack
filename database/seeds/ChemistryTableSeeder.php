<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ChemistryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chemistry')->insert(
            array(
                array("chemistry" => "Amplicon", "default" => true, "created_at" => Carbon::now(), "updated_at" => Carbon::now())
            ));
    }
}
