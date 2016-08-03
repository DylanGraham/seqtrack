<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UpdateI5TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('i5_index')->insert(
            array(
                array("index_set_id"=>"13", "index"=>"I5-Emty-Adapter0", "sequence"=>"TCTTTC", "created_at"=>Carbon::now(), "updated_at"=>Carbon::now()),
                array("index_set_id"=>"15", "index"=>"I5-Emty-Adapter1", "sequence"=>"TCTTTCCC", "created_at"=>Carbon::now(), "updated_at"=>Carbon::now()),
            ));
    }
}
