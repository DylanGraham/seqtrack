<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class IndexSetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('index_set')->insert(
            array(
                array("id" => "1", "name" => "Agilent NEW", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "2", "name" => "Agilent OLD", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "3", "name" => "Illumina Nextera", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "4", "name" => "Illumina NexteraXT", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "5", "name" => "Illumina RNA HT", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "6", "name" => "Illumina RNA LT", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "7", "name" => "Illumina small RNA", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "8", "name" => "ILLUMINA TRUSEQ 12 SET", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "9", "name" => "In house dual index", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "10", "name" => "INHOUSE 24 SET", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "11", "name" => "NimbleGen Set", "created_at" => Carbon::now(), "updated_at" => Carbon::now())
            ));

    }
}
