<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Adaptor;
use App\Application;
use App\Assay;
use App\Batch;
use App\Chemistry;
use App\Http\Requests;
use App\Http\Requests\SampleRunRequest;
use App\Iem_file_version;
use App\Instrument;
use App\ProjectGroup;
use App\Run;
use App\Run_status;
use App\SampleRun;
use App\Work_flow;
use Carbon\Carbon;
use DB;
use Session;
use Auth;

class RunDetailsController extends Controller
{
    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super', ['except' => ['index']]);
    }


    private $csvColumnCount = 10;
    private $runSamples = array();

    public function validateBatches($batches)
    {
        $first_sample = $batches[0]->samples[0];

        $errors = false;
        $sequnces = array();

        $i7_length = strlen($first_sample->i7_index->sequence);
        if (count($first_sample->i5_index)>0) {
            $i5_length = strlen($first_sample->i5_index->sequence);

        }else $i5_length = 0;

        foreach ($batches as $batch)
        {
            foreach ($batch->samples as $sample)
            {
                if (strlen($sample->i7_index->sequence) != $i7_length)
                {
                    $errors =true;
                }
                if (count($sample->i5_index)>0 )
                {
                    if (strlen($sample->i5_index->sequence) != $i5_length)
                    {
                        $errors = true;
                    }
                    $current_sequnce = $sample->i7_index->sequence." ".$sample->i5_index->sequence;

                }else
                {
                    if ($i5_length != 0) {
                        $errors = true;
                    }
                    $current_sequnce = $sample->i7_index->sequence;
                }
                if (array_key_exists ($current_sequnce,$sequnces)){
                    $errors = true;
                }else{
                    $sequnces[$current_sequnce]=1;
                }


            }
        }

        return $errors;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
     {
         $this->middleware('super');

         $batch_ids = Session::get('run_batch_ids');

         $batches = Batch::whereIn('id', $batch_ids)->get();
         $countProjectSamples = array();
         // initialise array to count number samples with runs remaining
         foreach ($batches as $batch)
         {
             $countProjectSamples[$batch->project_group_id]=0;
         }

         // count number samples with runs remaining in each selected batch
         foreach ($batches as $batch)
         {
             $count = 0;

             foreach ($batch->samples as $sample)
             {
                 if ($sample->runs_remaining >0)
                 {
                     $count++;
                 }
             }
             $countProjectSamples[$batch->project_group_id] += $count;
         }
         // most common project is one with highest count of samples with runs remaining
         $mostCommonProject = array_keys($countProjectSamples, max($countProjectSamples) );



         $dates = array( '0'=>Carbon::now()->format('d-M-Y'),
             '1'=>Carbon::now()->addDays(1)->format('d-M-Y'),
             '2'=>Carbon::now()->addDays(2)->format('d-M-Y'),
             '3'=>Carbon::now()->addDays(3)->format('d-M-Y'),
             '4'=>Carbon::now()->addDays(4)->format('d-M-Y'),
             '5'=>Carbon::now()->addDays(5)->format('d-M-Y'),
             '6'=>Carbon::now()->addDays(6)->format('d-M-Y'),
             '7'=>Carbon::now()->addDays(7)->format('d-M-Y')
         );

         $default_chemistry = DB::table('chemistry')->where('default', 1)->first();
         $default_adaptor = DB::table('adaptor')->where('default', 1)->first();
         $default_iem_file_version = DB::table('iem_file_version')->where('default', 1)->first();
         $default_application = DB::table('application')->where('default', 1)->first();
         $default_assay = DB::table('assay')->where('default', 1)->first();
         $default_work_flow = DB::table('work_flow')->where('default', 1)->first();
         $default_run_status = DB::table('run_status')->where('default', 1)->first();

         return view('sampleRuns.createRunDetails', [
             'batch_ids' => $batch_ids,
             'batches' =>   $batches,
             'adaptor' => Adaptor::lists('value',  'id'),
             'iem_file_version' => Iem_file_version::lists('file_version', 'id'),
             'application' => Application::lists('application', 'id'),
             'chemistry' => Chemistry::lists('chemistry',  'id'),
             'run_status' => Run_status::lists('status',  'id'),
             'instrument' => Instrument::lists('name','id'),
             'work_flow' => Work_flow::lists('value','id'),
             'assay' => Assay::lists('name',  'id'),
             'run_date'=> $dates,
             'sampleRun' => SampleRun::lists('run_id', 'sample_id'),
             'projectGroup' => ProjectGroup::lists('name', 'id'),

             'default_chemistry_id' => $default_chemistry->id,
             'default_adaptor_id' => $default_adaptor->id,
             'default_iem_file_version_id' => $default_iem_file_version->id,
             'default_application_id' => $default_application->id,
             'default_assay_id' =>  $default_assay->id,
             'default_work_flow_id' => $default_work_flow->id,
             'default_run_status_id' => $default_run_status->id,
             'default_project_id' => $mostCommonProject[0]

         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SampleRunRequest $request)
    {

        $input = $request->all();

        $run = new Run($input);
        $run->users_id = Auth::user()->id;
        $run->run_date = Carbon::now()->addDays($request->get('run_date'));
        $run->created_at = Carbon::now();
        $run->updated_at = Carbon::now();

        $run->save();

        $batch_ids = Session::get('run_batch_ids');

        $batches = Batch::whereIn('id', $batch_ids)->get();

        $errors = $this->validateBatches($batches);


        if (!$errors) {
            $this->runSamples = array();
            foreach ($batches as $batch) {
                foreach ($batch->samples as $sample) {
                    if ($sample->runs_remaining > 0) {
                        $sampleRun = new SampleRun();
                        $sampleRun->created_at = Carbon::now();
                        $sampleRun->updated_at = Carbon::now();
                        $sampleRun->run_id = $run->id;
                        $sampleRun->sample_id = $sample->id;
                        $sampleRun->save();
                        $sample->runs_remaining -= 1;
                        $sample->update();
                        array_push($this->runSamples, $sample);
                    }
                }
            }
        }

        if ($errors)
        {
            return view('sampleRuns.errors',[

                'batches' =>$batches
            ]);
        }

        $this->exportSheet($run);

        return redirect('runs');
    }

    public function exportSheet($run) {
        $headerRowCount = 20;
        //dd($run);
        header('Content-Disposition: attachment; filename="HiSeq.csv"');
        header("Cache-control: private");
        header("Content-type: application/force-download");
        header("Content-transfer-encoding: binary\n");
        $out = fopen('php://output', 'w');
        for($i = 1; $i <= $headerRowCount; $i++) {
            fputcsv($out, explode(',', $this->getCSVHeader($run, $i)));
        }
        fputcsv($out, explode(',', $this->getSamplesHeader()));
        for($i = 0; $i < Count($this->runSamples); $i++) {
            fputcsv($out, explode(',', $this->getSampleData($this->runSamples[$i])));
        }
        fclose($out);

        return redirect('runs');
    }

    public function getCSVHeader($run, $number) {
        $tmpString = "";
        if($number == 1) {
            $tmpString = "[Header]";
            return $tmpString;
        }
        else if($number == 2) {
            $iem_file_version = DB::table('iem_file_version')->where('default', $run->iem_file_version_id)->first();
            $tmpString = "IEMFileVersion," . $iem_file_version->file_version . $this->addExtraCommas(8);
            return $tmpString;
        }
        else if($number == 3) {
            $user = Auth::user();
            $tmpString = "InvestigatorName," . $user->name;
            return $tmpString;
        }
        else if($number == 4) {
            $projectId = DB::table('project_group')->where('id', $run->project_group_id)->first();
            $tmpString = "ProjectName," . $projectId->name;
            return $tmpString;
        }
        else if($number == 5) {
            $tmpString = "ExperimentName," . $run->experiment_name;
            return $tmpString;
        }
        //TODO why do we have date selection
        else if($number == 6) {
            $tmpString = "Date," . $run->run_date->format('d-m-Y');
            return $tmpString;
        }
        else if($number == 7) {
            $workFlow = DB::table('work_flow')->where('id', $run->work_flow_id)->first();
            $tmpString = "Workflow," . $workFlow->value;
            return $tmpString;
        }
        else if($number == 8) {
            $application = DB::table('application')->where('id', $run->application_id)->first();
            $tmpString = "Application," . $application->application;
            return $tmpString;
        }
        else if($number == 9) {
            $assay = DB::table('assay')->where('id', $run->assay_id)->first();
            $tmpString = "Assay," . $assay->name;
            return $tmpString;
        }
        else if($number == 10) {
            $tmpString = "Description," . $run->description . $this->addExtraCommas(8);
            return $tmpString;
        }
        else if($number == 11) {
            $chemistry = DB::table('chemistry')->where('id', $run->chemistry_id)->first();
            $tmpString = "Chemistry,". $chemistry->chemistry;
            return $tmpString;
        }
        else if($number == 12) {
            $tmpString = ",";
            return $tmpString;
        }
        else if($number == 13) {
            $tmpString = "[Reads]";
            return $tmpString;
        }
        else if($number == 14) {
            $tmpString = $run->read1;
            return $tmpString;
        }
        else if($number == 15) {
            $tmpString = $run->read2.",";
            return $tmpString;
        }
        else if($number == 16) {
            $tmpString = ",";
            return $tmpString;
        }
        else if($number == 17) {
            $tmpString = "[Settings]";
            return $tmpString;
        }
        else if($number == 18) {
            $adapter = DB::table('adaptor')->where('id', $run->iem_file_version_id)->first();
            $tmpString = "Adapter," . $adapter->value;
            return $tmpString;
        }
        else if($number == 19) {
            $tmpString = ",";
            return $tmpString;
        }
        else if($number == 20) {
            $tmpString = "[Data]";
            return $tmpString;
        }
        else {
            return $tmpString;
        }
    }

    public function getSamplesHeader() {
        return "Sample_ID,Sample_Name,Sample_Plate,Sample_Well,I7_Index_ID,index,I5_Index_ID,index2,Sample_Project,Description";
    }

    public function getSampleData($sample) {
        $del = ",";
        $tempString = "";
        $tempString .= $sample->id.$del;
        $tempString .= $sample->sample_id.$del;
        $tempString .= $sample->plate.$del;
        $tempString .= $sample->well.$del;
        $i7Index = DB::table('i7_index')->where('id', $sample->i7_index_id)->first();
        $tempString .= $i7Index->index.$del;
        $tempString .= $i7Index->sequence.$del;
        if($sample->i5_index_id != NULL) {
            $i5Index = DB::table('i5_index')->where('id', $sample->i5_index_id)->first();
            $tempString .= $i5Index->index . $del;
            $tempString .= $i5Index->sequence . $del;
        } else {
            $tempString .= $del.$del;
        }
        $batch = DB::table('batches')->where('id', $sample->batch_id)->first();
        $project = DB::table('project_group')->where('id', $batch->project_group_id)->first();
        $tempString .= $project->name.$del;
        $tempString .= $sample->description.$del;
        return $tempString;
    }

    public function addExtraCommas($number) {
        $tmpString = "";
        for($i = 0; $i < $number; $i++) {
            $tmpString .= ",";
        }
        return $tmpString;
    }
}
