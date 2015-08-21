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
        DB::table('index_set')->insert([
            'index_set' =>  'Agilent NEW',
            'single'    =>  'true',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);

        DB::table('index_set')->insert([
            'index_set' =>  'Agilent OLD',
            'single'    =>  'true',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);

        DB::table('index_set')->insert([
            'index_set' =>  'Illumina Nextera',
            'single'    =>  'false',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);

        DB::table('index_set')->insert([
            'index_set' =>  'Illumina NexteraXT',
            'single'    =>  'false',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);

        DB::table('index_set')->insert([
            'index_set' =>  'Illumina RNA HT',
            'single'    =>  'false',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);

        DB::table('index_set')->insert([
            'index_set' =>  'Illumina RNA LT',
            'single'    =>  'true',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);

        DB::table('index_set')->insert([
            'index_set' =>  'Illumina small RNA',
            'single'    =>  'true',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);

        DB::table('index_set')->insert([
            'index_set' =>  'ILLUMINA TRUSEQ 12 SET',
            'single'    =>  'true',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);

        DB::table('index_set')->insert([
            'index_set' =>  'In house dual index',
            'single'    =>  'false',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);

        DB::table('index_set')->insert([
            'index_set' =>  'INHOUSE 24 SET',
            'single'    =>  'true',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);
    }
}
