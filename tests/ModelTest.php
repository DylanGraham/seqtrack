<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelTest extends TestCase
{
    use DatabaseTransactions;

    public function test_batch_model_user()
    {
        $batch = App\Batch::find(3);
        $name = $batch->user->name;

        $this->assertNotNull($name);
    }

    public function test_batch_model_samples()
    {
        $batch = App\Batch::find(3);
        $samples = $batch->samples;

        $this->assertNotNull($samples);
    }

    public function test_batch_model_group()
    {
        $batch = App\Batch::find(3);
        $group = $batch->project_group->name;

        $this->assertNotNull($group);
    }

    public function test_adaptor_model()
    {
        $adaptor = App\Adaptor::find(1);
        $runs = $adaptor->runs;

        $this->assertNotNull($runs);
    }

    public function test_application_model()
    {
        $application = App\Application::find(1);
        $runs = $application->runs;

        $this->assertNotNull($runs);
    }

    public function test_assay_model()
    {
        $assay = App\Assay::find(1);
        $run = $assay->runs;

        $this->assertNotNull($run);
    }

    public function test_chemistry_model()
    {
        $chemistry = App\Chemistry::find(1);
        $runs = $chemistry->runs;

        $this->assertNotNull($runs);
    }

    public function test_index_set_model()
    {
        $set1 = App\IndexSet::find(1);
        $set3 = App\IndexSet::find(3);
        $i7 = $set1->I7Indexes;
        $i5 = $set3->I5Indexes;

        $this->assertNotNull($i7);
        $this->assertNotNull($i5);
    }

    public function test_i5index_model()
    {
        $i5 = App\I5Index::find(1);
        $index_set = $i5->IndexSet;
        $sample = $i5->sample;

        $this->assertNotNull($index_set);
        $this->assertNotNull($sample);
    }

    public function test_i7index_model()
    {
        $i7 = App\I7Index::find(1);
        $index_set = $i7->IndexSet;
        $sample = $i7->sample;

        $this->assertNotNull($index_set);
        $this->assertNotNull($sample);
    }

    public function test_Iem_file_version_model()
    {
        $iem = App\Iem_file_version::find(1);
        $runs = $iem->runs;

        $this->assertNotNull($runs);
    }

    public function test_instrument_model()
    {
        $inst = App\Instrument::find(1);
        $runs = $inst->run;

        $this->assertNotNull($runs);
    }

    public function test_project_group_model()
    {
        $pg = App\ProjectGroup::find(1);
        $batches = $pg->batch;

        $this->assertNotNull($batches);
    }

    public function test_run_model()
    {
        $user = App\User::find(1);                                                                                                      
                                                                                                                                        
        $input = [                                                                                                                      
            'batch_check_id' => [2, 3]                                                                                                  
        ];                                                                                                                              
                                                                                                                                        
        $this->actingAs($user)                                                                                                          
            ->visit('/sampleRuns/create')                                                                                               
            ->submitForm('Next -> Enter run details', $input)                                                                           
            ->seePageIs('/runDetails/create')                                                                                           
            ->type('TestExperiment', 'experiment_name')                                                                                 
            ->type('Desc', 'description')                                                                                               
            ->type('111', 'read1')                                                                                                      
            ->type('222', 'read2')                                                                                                      
            ->type('FCID', 'flow_cell')                                                                                                 
            ->press('Submit');

        $run = App\Run::first();
        $adaptor = $run->adaptor;
        $application = $run->application;
        $assay = $run->assay;
        $chemistry = $run->chemistry;
        $iem_file_version = $run->iem_file_version;
        $instrument = $run->instrument;
        $run_status = $run->run_status;
        $work_flow = $run->work_flow;
        $user = $run->users;
        $project_group = $run->project_group;
        $sample_runs = $run->runs;

        $this->assertNotNull($adaptor);
        $this->assertNotNull($application);
        $this->assertNotNull($assay);
        $this->assertNotNull($chemistry);
        $this->assertNotNull($iem_file_version);
        $this->assertNotNull($instrument);
        $this->assertNotNull($run_status);
        $this->assertNotNull($work_flow);
        $this->assertNotNull($user);
        $this->assertNotNull($project_group);
        $this->assertNotNull($sample_runs);
    }

    public function test_run_status_model()
    {
        $run_status = App\Run_status::find(1);
        $runs = $run_status->runs;

        $this->assertNotNull($runs);
    }

    public function test_sample_model()
    {
        $s = App\Sample::find(1);

//        $user = $s->user;
        $batch = $s->batch;
        $i7 = $s->i7_index;
        $sample_runs = $s->sampleRuns;

//        $this->assertNotNull($user);
        $this->assertNotNull($batch);
        $this->assertNotNull($i7);
        $this->assertNotNull($sample_runs);
    }


}
