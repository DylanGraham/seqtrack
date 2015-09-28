<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RealTest extends TestCase
{
    use DatabaseTransactions;

    public function test_main_page()
    {
        $this->visit('/')
            ->seePageIs('/auth/login')
            ->see('SeqTrack');
    }

    public function test_navbar()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/')
            ->see('Create Batch')
            ->see('Create Sample')
            ->see('Create Run')
            ->see('View Batch')
            ->see('View Sample')
            ->see('View Run');
    }

    public function test_create_sample_mismatch()
    {
        $user = App\User::find(1);

        $this->actingAs($user)
            ->visit('/samples/create')
            ->select(3, 'batch_id')
            ->type('AF0TJ_Cs-WW-419124R-20150109-well-D1', 'sample_id')
            ->select(1, 'index_set')
            ->select(1, 'i7_index_id')
            ->type('PHPUnit', 'description')
            ->type(5, 'runs_remaining')
            ->type(1, 'instrument_lane')
            ->press('Submit')
            ->see('Index set mismatch!');
    }

    public function test_create_batch()
    {
        $user = App\User::find(1);

        $this->actingAs($user)
            ->visit('/batches/create')
            ->type('PHPUnit-batch', 'batch_name')
            ->type(1.5, 'concentration')
            ->type(1.5, 'volume')
            ->type('PHPUNITBARCODE', 'tube_bar_code')
            ->type('PHPUnitLocation', 'tube_location')
            ->type(55, 'tape_station_length')
            ->type('8000-00000-00-888', 'charge_code')
            ->select(3, 'project_group_id')
            ->press('Submit')
            ->dontSee('alert-danger')
            ->seePageIs('/batches')
            ->see('PHPUnit-batch')
            ->seeInDatabase('batches', ['batch_name' => 'PHPUnit-batch']);
    }

    public function test_create_batch_fail_name()
    {
        $user = App\User::find(1);

        $this->actingAs($user)
            ->visit('/batches/create')
            ->type('PHPUnit batch', 'batch_name')
            ->type(1.5, 'concentration')
            ->type(1.5, 'volume')
            ->type('PHPUNITBARCODE', 'tube_bar_code')
            ->type('PHPUnitLocation', 'tube_location')
            ->type(55, 'tape_station_length')
            ->type('8000-00000-00-888', 'charge_code')
            ->select(3, 'project_group_id')
            ->press('Submit')
            ->see('alert-danger');
    }

    public function test_create_batch_fail_blank()
    {
        $user = App\User::find(1);

        $this->actingAs($user)
            ->visit('/batches/create')
            ->type('', 'batch_name')
            ->type('', 'concentration')
            ->type('', 'volume')
            ->type('', 'tube_bar_code')
            ->type('', 'tube_location')
            ->type('', 'tape_station_length')
            ->type('', 'charge_code')
            ->press('Submit')
            ->see('alert-danger');
    }

    public function test_create_run_denied_for_non_super_user()
    {
        $user = factory(App\User::class)->create();
        
        $this->actingAs($user)
            ->visit('/sampleRuns/create')
            ->seePageIs('/');
    }

    public function test_create_run()
    {
        $user = App\User::find(1);

        $input = [
            'batch_check_id' => [2, 3]
        ];

        $this->actingAs($user)
            ->visit('/sampleRuns/create')
            ->submitForm('Next -> Enter run details', $input)
            ->seePageIs('/runDetails/create');
    }
}
