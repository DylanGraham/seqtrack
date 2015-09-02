<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("batches")->insert([
            "user_id"       =>  "1",
            "batch_name"    =>  "Historical",
            "concentration" =>  "0.0",
            "volume"        =>  "0.0",
            "tube_bar_code" =>  "x",
            "tube_location" =>  "x",
            "tape_station_length" =>  "0.0",
            "charge_code"   =>  "x",
            "created_at"    =>  Carbon::now(),
            "updated_at"    =>  Carbon::now(),
        ]);
    }
}
