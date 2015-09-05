<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\BatchRequest;
use App\Http\Controllers\Controller;
use App\Batch;
use App\Run;
use App\Sample;
use App\ProjectGroup;
use Carbon\Carbon;
use DB;
class sampleRunController extends Controller
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

        $batches = DB::table('batches')
                    ->join('samples', function ($join) {
                        $join->on('batches.id','=', 'samples.batch_id');
                    })
                    ->where('samples.runs_remaining', '>', 0)
                    ->get();

        return view('sampleRuns.create',[

            'runs' =>$runs,
            'batches' => $batches
        ]);
    }

    public function store(SampleRunRequest $request)
    {
        $input = $request->all();



        return "TODO sample run store";
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

        $runs = Run::lists('description', 'id');

        $batches = DB::table('batches')
            ->select('batches.id','batches.batch_name', DB::raw('COUNT(*) as num_samples'), DB::raw('MAX(samples.runs_remaining) as max_runs'))
            ->join('samples', function ($join) {
                $join->on('batches.id','=', 'samples.batch_id');
            })
            ->where('samples.runs_remaining', '>', 0)
            ->groupBy('batches.id')
            ->get();



        return view('sampleRuns.batchesRunsRemaining',[

            'runs' =>$runs,
            'batches' => $batches
        ]);
    }

    public function samplesRunsRemaining()
    {
        $runs = Run::lists('description', 'id');

        $batches = DB::table('batches')
            ->join('samples', function ($join) {
                $join->on('batches.id','=', 'samples.batch_id');
            })
            ->where('samples.runs_remaining', '>', 0)
            ->get();

        return view('sampleRuns.create',[

            'runs' =>$runs,
            'batches' => $batches
        ]);
    }
}
