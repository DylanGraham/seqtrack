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
<<<<<<< HEAD
        /*$this->call(SamplesTableSeeder::class);*/
=======
<<<<<<< HEAD
        //$this->call(SamplesTableSeeder::class);
=======
        /*$this->call(SamplesTableSeeder::class);*/
>>>>>>> e6db2abd90bd9de187dbb4ae9054fdafc9e32d10
>>>>>>> c97b2ba7a7093b55db0b0f22a037e3ef0c72b2ed
        $this->call(BatchesTestTableSeeder::class);
        $this->call(SamplesTestTableSeeder::class);


        Model::reguard();
    }
}
