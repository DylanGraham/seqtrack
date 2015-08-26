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

        DB::table('users')->insert(array(
array("user_id"=>"ac29", "name"=>"Amanda Chamberlain", "default_project_id"=>"5", "default_charge_code"=>"8338-03537-21-001", "super"=>true),
array("user_id"=>"bm60", "name"=>"Brett Mason", "default_project_id"=>"5", "default_charge_code"=>"8338-03537-21-001", "super"=>false),
array("user_id"=>"bp24", "name"=>"Bec Baillie", "default_project_id"=>"9", "default_charge_code"=>"8338-01808-21-379", "super"=>false),
array("user_id"=>"cp88", "name"=>"Claire Prowse-Wilkins", "default_project_id"=>"5", "default_charge_code"=>"8282-03539-21-352", "super"=>false),
array("user_id"=>"cr55", "name"=>"Coralie Reich", "default_project_id"=>"5", "default_charge_code"=>"8340-03534-21-001", "super"=>false),
array("user_id"=>"hs01", "name"=>"Hiroshi Shinozuka", "default_project_id"=>"9", "default_charge_code"=>"8232-08186-21-001", "super"=>false),
array("user_id"=>"jk33", "name"=>"Jatinder Kaur", "default_project_id"=>"9", "default_charge_code"=>"8332-08144-21-375", "super"=>false),
array("user_id"=>"jt59", "name"=>"Josquin Tibbits", "default_project_id"=>"6", "default_charge_code"=>"8338-01808-21-379", "super"=>true),
array("user_id"=>"md28", "name"=>"Michelle Drayton", "default_project_id"=>"4", "default_charge_code"=>"8338-11389-21-379", "super"=>false),
array("user_id"=>"ms89", "name"=>"Maiko Shinozuka", "default_project_id"=>"4", "default_charge_code"=>"8338-11389-21-379", "super"=>false),
array("user_id"=>"rm52", "name"=>"Ross Mann", "default_project_id"=>"15", "default_charge_code"=>"8332-03373-21-389", "super"=>false),
array("user_id"=>"ss1b", "name"=>"Shimna Sudheesh", "default_project_id"=>"6", "default_charge_code"=>"8338-01808-21-379", "super"=>false),
array("user_id"=>"tw05", "name"=>"Tracie Webster", "default_project_id"=>"6", "default_charge_code"=>"8338-01808-21-379", "super"=>true),
array("user_id"=>"nc24", "name"=>"Noel Cogan", "default_project_id"=>"14", "default_charge_code"=>"8282-03539-21-352", "super"=>false),
array("user_id"=>"sk00", "name"=>"Sukhjiwan Kaur", "default_project_id"=>"4", "default_charge_code"=>"8338-11389-21-379", "super"=>false),
array("user_id"=>"km1f", "name"=>"Katerina Viduka", "default_project_id"=>"6", "default_charge_code"=>"8338-01808-21-379", "super"=>true),
        )); 

    }
}
