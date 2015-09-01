<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class IemFileVersionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iem_file_version')->insert(
            array(
                'file_version' => '4','default' => true,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())

        );
    }
}
