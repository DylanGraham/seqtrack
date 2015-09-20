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
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      return "TODO";
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
             $count =0;

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

        $batch_ids = $input['batch_ids'];

        $batches = Batch::whereIn('id', $batch_ids)->get();

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

        dd("errors",$errors,"i5",$i5_length,"i7",$i7_length,$first_sample);
        if (!$errors) {
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
                    }
                }
            }
        }

        return redirect('runs');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
