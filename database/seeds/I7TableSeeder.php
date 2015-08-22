<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class I7TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('i7_index')->insert([
            'index'         =>  'Name',
            'sequence'      =>  'AAAAAAAA',
            'index_set_id'  =>  '1',
            'created_at'    =>  Carbon::now(),
            'updated_at'    =>  Carbon::now(),
        ]);

    }
}
