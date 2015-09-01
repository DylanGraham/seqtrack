<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdaptorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adaptor')->insert(
            array(
                'value' => 'CTGTCTCTTATACACATCT','default' => true,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())

        );
    }
}
