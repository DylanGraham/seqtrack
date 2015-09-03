<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RealTest extends TestCase
{
    use DatabaseTransactions;

    public function test_main_page()
    {
        $this->visit('/')
            ->seePageIs('/')
            ->see('SeqTrack');
    }

    public function test_main_link_to_samples()
    {
        $this->visit('/')
            ->click('Enter samples')
            ->seePageIs('/samples/create');
    }

    public function test_samples_page_exists()
    {
        $this->visit('/samples')
            ->see('Samples');
    }

/*    public function test_samples_page_form()
    {
        $this->visit('/samples/create')
            ->type('PASTURE', 'basc_group_id')
            ->type('AF0TJ_Cs-WW-419124R-20150109-well-D1', 'name')
            ->type('ATTACTCG', 'i7_index_id')
            ->type('GGCTCTGA', 'i5_index_id')
            ->press('submit')
            ->seePageIs('/samples');
    }*/

}
