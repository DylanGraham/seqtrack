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

    public function test_main_link_to_samples()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/')
            ->click('Create samples')
            ->seePageIs('/samples/create');
    }

    public function test_navbar()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/')
            ->see('Create Batch')
            ->see('Create Sample')
            ->see('Create Run')
            ->see('View Batch')
            ->see('View Sample')
            ->see('View Run');
    }

    public function test_samples_page_form()
    {
        $user = App\User::find(1);
//        $user->super = true;

        $this->actingAs($user)
            ->visit('/samples/create')
//            ->type('PASTURE', 'project_group_id')
            ->select(3, 'batch_id')
            ->type('AF0TJ_Cs-WW-419124R-20150109-well-D1', 'sample_id')
            ->select(1, 'index_set')
            ->select(1, 'i7_index_id')
//          ->select('GGCTCTGA', 'i5_index_id')
            ->type('PHPUnit', 'description')
            ->type(5, 'runs_remaining')
            ->type(1, 'instrument_lane')
            ->press('Submit')
            ->see('Index set mismatch!');
    }

}
