<?php

use Illuminate\Database\Seeder;

class UpdateInstrumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::update("update instrument set name='MiSeq01' where name='M01054'");
        DB::update("update instrument set name='MiSeq02' where name='M03633'");
        DB::update("update instrument set name='MiSeq03' where name='M01697'");
    }
}
