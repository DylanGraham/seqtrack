<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableTestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dylan',
            'email' => 'dylan@example.com',
            'user_id' => 'abcd',
            'password' => bcrypt('password'),
            'super' => '1',
            'default_project_id' => '1',
            'default_charge_code' => '8000-00000-00-001',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Phillip',
            'email' => 'phillip@example.com',
            'user_id' => 'efgh',
            'password' => bcrypt('password'),
            'super' => '0',
            'default_project_id' => '4',
            'default_charge_code' => "8338-11389-21-379",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
