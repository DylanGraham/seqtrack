<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UpdateIndexSetTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('index_set')->insert(
            array(
                array("id" => "12", "name" => "NimbleGen-6Bp-Single-Index", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "13", "name" => "NimbleGen-6Bp-Dual-Index", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "14", "name" => "NimbleGen-8Bp-Single-Index", "created_at" => Carbon::now(), "updated_at" => Carbon::now()),
                array("id" => "15", "name" => "NimbleGen-8Bp-Dual-Index", "created_at" => Carbon::now(), "updated_at" => Carbon::now())
            ));

    }
}
