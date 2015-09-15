<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

      $this->call(UserTableSeeder::class);
      $this->call(IndexSetTableSeeder::class);
      $this->call(I7TableSeeder::class);
      $this->call(I5TableSeeder::class);

        $this->call(WorkFlowTableSeeder::class);
        $this->call(AdaptorTableSeeder::class);
        $this->call(ApplicationTableSeeder::class);
        $this->call(AssayTableSeeder::class);
        $this->call(RunStatusTableSeeder::class);
        $this->call(ProjectGroupTableSeeder::class);
        $this->call(InstrumentTableSeeder::class);
        $this->call(IemFileVersionTableSeeder::class);
        $this->call(ChemistryTableSeeder::class);
        $this->call(BatchesTableSeeder::class);
        /*$this->call(SamplesTableSeeder::class);*/
        $this->call(BatchesTestTableSeeder::class);
        $this->call(SamplesTestTableSeeder::class);


        Model::reguard();
    }
}
