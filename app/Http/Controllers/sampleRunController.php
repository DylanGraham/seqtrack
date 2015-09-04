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

        $batches = Batch::all();

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
}
