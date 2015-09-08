<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\BatchRequest;
use App\Http\Controllers\Controller;
use App\Batch;

use App\Sample;

use Carbon\Carbon;
use DB;

use Auth;

use App\Http\Requests\RunRequest;
use App\Http\Requests\SampleRunRequest;
use App\Application;
use App\Chemistry;
use App\Run_status;
use App\Instrument;
use App\Iem_file_version;
use App\Work_flow;
use App\Assay;
use App\Adaptor;
use App\SampleRun;
use App\ProjectGroup;
use App\Run;
class SampleRunController extends Controller
{
    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/BatchRunRequest.php"
    */

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('super' ['except' => ['index', '' ]]);
    }

    public function index()
    {

        return " to do Sample Runs Index";
    }

    public function create()
    {
        $runs = Run::lists('description', 'id');

        $batches = Batch::whereHas('samples', function($query)
        {
            $query->where('runs_remaining' ,'>', 0);
        })->get();


        return view('sampleRuns.create',[

            'runs' =>$runs,
            'batches' => $batches
        ]);
    }

    public function store(RunRequest $request)
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

        foreach ($batches as $batch)
        {
            foreach ($batch->samples as $sample)
            {
                if ($sample->runs_remaining >0) {
                    $sampleRun  = new SampleRun();
                    $sampleRun->created_at = Carbon::now();
                    $sampleRun->updated_at = Carbon::now();
                    $sampleRun->run_id = $run->id;
                    $sampleRun->sample_id = $sample->id;
                    $sampleRun->save();
                    $sample->runs_remaining -=1;
                    $sample->update();
                }
            }


        }

        return "Sample run stored - TODO redirect";
    }

    public function show(SampleRun $sampleRun)
    {

    }

    public function edit(SampleRun $sampleRun)
    {

        return "TODO sample run edit";
    }


    public function update(SampleRun $sampleRun)
    {

        return "Todo sample run update";
    }

    public function batchesRunsRemaining()
    {

//        $batches = DB::table('batches')
//            ->select('batches.id','batches.batch_name', DB::raw('COUNT(*) as num_samples'), DB::raw('MAX(samples.runs_remaining) as max_runs'),'users.name')
//            ->join('samples', function ($join) {
//                $join->on('batches.id','=', 'samples.batch_id');
//            })
//            ->join('users', function ($join) {
//                $join->on('users.id','=', 'batches.user_id');
//            })
//            ->where('samples.runs_remaining', '>', 0)
//            ->groupBy('batches.id')
//            ->get();

        $batches = Batch::whereHas('samples', function($query)
        {
            $query->where('runs_remaining' ,'>', 0);
        })->get();



        return view('sampleRuns.batchesRunsRemaining',[

            'batches' => $batches
        ]);
    }

    public function samplesRunsRemaining()
    {

        $batches = DB::table('batches')
            ->join('samples', function ($join) {
                $join->on('batches.id','=', 'samples.batch_id');
            })
            ->join('users', function ($join) {
                $join->on('users.id','=', 'batches.user_id');
            })
            ->where('samples.runs_remaining', '>', 0)
            ->get();

        return view('sampleRuns.samplesRunsRemaining',[

            'batches' => $batches
        ]);
    }

    public function runDetails(Requests\SampleRunRequest $input)
    {
        $message = " enter details";

        $batch_ids = $input->batch_check_id;

            foreach($batch_ids as $batch_id)
            {
                $message = $message ." ".$batch_id;
            }

        $batches = Batch::whereIn('id', $batch_ids)->get();

        $this->middleware('super');

        $dates = array( '0'=>Carbon::now()->format('d-m-Y'),
            '1'=>Carbon::now()->addDays(1)->format('d-m-Y'),
            '2'=>Carbon::now()->addDays(2)->format('d-m-Y'),
            '3'=>Carbon::now()->addDays(3)->format('d-m-Y'),
            '4'=>Carbon::now()->addDays(4)->format('d-m-Y'),
            '5'=>Carbon::now()->addDays(5)->format('d-m-Y'),
            '6'=>Carbon::now()->addDays(6)->format('d-m-Y'),
            '7'=>Carbon::now()->addDays(7)->format('d-m-Y')
        );

        $default_chemistry = DB::table('chemistry')->where('default', 1)->first();
        $default_adaptor = DB::table('adaptor')->where('default', 1)->first();
        $default_iem_file_version = DB::table('iem_file_version')->where('default', 1)->first();
        $default_application = DB::table('application')->where('default', 1)->first();
        $default_assay = DB::table('assay')->where('default', 1)->first();
        $default_work_flow = DB::table('work_flow')->where('default', 1)->first();
        $default_run_status = DB::table('run_status')->where('default', 1)->first();

        return view('runs.create', [
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

        ]);



    }
}
