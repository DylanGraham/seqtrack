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

    public function test_batch_create_page()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/batches/create')
            ->see('Create Batch');
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

    public function test_create_batch_edit()
    {
        $user = App\User::find(1);

        $this->actingAs($user)
            ->visit('/batches/3/edit')
            ->type(1.5, 'concentration')
            ->type(1.5, 'volume')
            ->type(55, 'tape_station_length')
            ->press('Update')
            ->seePageIs('batches');
    }

    public function test_batch_show()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/batches/3')
            ->see('description13')
            ->see('description14')
            ->see('description15')
            ->see('description16');
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

    public function test_adaptor_exists()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/adaptor')
            ->see('Adaptors')
            ->see('CTGTCTCTTATACACATCT')
            ->seeInDatabase('adaptor', ['id' => '1']);
           
    }

    public function test_adaptor_add()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/adaptor/create')
            ->type('CTGTCTCTTATACACATCA', 'value')
            ->press('Save')
            ->seeInDatabase('adaptor', ['value' => 'CTGTCTCTTATACACATCA'])
            ->seePageIs('/adaptor');
    }

    public function test_application_page()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/application')
            ->seePageIs('/application')
            ->see('Applications');
    }

    public function test_application_create()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/application/create')
            ->type('NEWQ', 'application')
            ->press('Save')
            ->see('NEWQ')
            ->seeInDatabase('application', ['application' => 'NEWQ'])
            ->seePageIs('/application');
    }

    public function test_assay_page()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/assay')
            ->seePageIs('/assay')
            ->see('Assay');
    }

    public function test_assay_create()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/assay/create')
            ->type('ASSAYnew', 'name')
            ->press('Save')
            ->see('ASSAYnew')
            ->seeInDatabase('assay', ['name' => 'ASSAYnew'])
            ->seePageIs('/assay');
    }

    public function test_chemistry_page()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/chemistry')
            ->seePageIs('/chemistry')
            ->see('Chemistry');
    }

    public function test_chemistry_create()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/chemistry/create')
            ->type('newChemistry', 'chemistry')
            ->press('Save')
            ->see('newChemistry')
            ->seeInDatabase('chemistry', ['chemistry' => 'newChemistry'])
            ->seePageIs('/chemistry');
    }

    public function test_instrument_page()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/instrument')
            ->seePageIs('/instrument')
            ->see('Instruments');
    }

    public function test_instrument_create()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/instrument/create')
            ->type('XX0011', 'name')
            ->press('Save')
            ->see('XX0011')
            ->seeInDatabase('instrument', ['name' => 'XX0011'])
            ->seePageIs('/instrument');
    }

    public function test_project_groups_page()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/project_groups')
            ->seePageIs('/project_groups')
            ->see('Project Group');
    }

    public function test_project_group_create()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/project_groups/create')
            ->type('NEWBASC', 'name')
            ->press('Save')
            ->see('NEWBASC')
            ->seeInDatabase('project_group', ['name' => 'NEWBASC'])
            ->seePageIs('/project_groups');
    }

    public function test_workflow_page()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/workflow')
            ->seePageIs('/workflow')
            ->see('Workflow');
    }

    public function test_workflow_create()
    {
        $user = factory(App\User::class)->create();
        $user->super = true;

        $this->actingAs($user)
            ->visit('/workflow/create')
            ->type('WORKflow', 'value')
            ->press('Save')
            ->see('WORKflow')
            ->seeInDatabase('work_flow', ['value' => 'WORKflow'])
            ->seePageIs('/workflow');
    }

    public function test_import_page()
    {
        $user = App\User::find(1);

        $this->actingAs($user)
            ->visit('/import')
            ->seePageIs('/import')
            ->see('Import Samples');
    }

}
