<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      =>  'Dylan',
            'email'     =>  'dylan@example.com',
            'user_id'   =>  'abcd',
            'password'  =>  bcrypt('password'),
            'super'     =>  '1',
            'created_at'=>  Carbon::now(),
            'updated_at'=>  Carbon::now(),
        ]);
    }
}
