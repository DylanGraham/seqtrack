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
}
