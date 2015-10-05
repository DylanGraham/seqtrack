<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Http\Requests;
use App\Http\Requests\BatchIdRequest;
use App\Run;
use App\SampleRun;

use DB;
use Session;

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
        $this->middleware('super' ,['except' => ['index'=> '' ]]);
    }

    public function index()
    {

        return " to do Sample Runs Index";
    }


    // to add samples to a run find all batches with samples with runs remaining greater than 0
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

    // Save in session batch ids selected to place in a run then go to
    // runDetails to add run fields.
    public function store(BatchIdRequest $input)
    {
        $batch_ids = $input->batch_check_id;

        Session::forget('run_batch_ids');
        Session::put('run_batch_ids', $batch_ids);

        return redirect('runDetails/create');
    }


    public function show(SampleRun $sampleRun)
    {
        return "TODO sample run show";
    }

    public function edit(SampleRun $sampleRun)
    {

        return "TODO sample run edit";
    }


    public function update(SampleRun $sampleRun)
    {

        return "Todo sample run update";
    }

    // Show a list of batches with runs remaining
    public function batchesRunsRemaining()
    {

        $batches = Batch::whereHas('samples', function($query)
        {
            $query->where('runs_remaining' ,'>', 0);
        })->get();

        return view('sampleRuns.batchesRunsRemaining',[

            'batches' => $batches
        ]);
    }

    // Show a list of samples with runs remaining
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



    public function exportRuns($run)
    {

    }
}
