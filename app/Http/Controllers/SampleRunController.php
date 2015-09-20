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
  //      $this->middleware('auth');
        $this->middleware('super' ,['except' => ['index'=> '' ]]);
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

//    public function store(SampleRunRequest $request)
//    {
//
//        $input = $request->all();
//
//        $run = new Run($input);
//        $run->users_id = Auth::user()->id;
//        $run->run_date = Carbon::now()->addDays($request->get('run_date'));
//        $run->created_at = Carbon::now();
//        $run->updated_at = Carbon::now();
//
//        $run->save();
//
//        $batch_ids = $input['batch_ids'];
//
//        $batches = Batch::whereIn('id', $batch_ids)->get();
//
//        $first_sample = $batches[0]->samples[0];
//
//        $errors = false;
//        $sequnces = array();
//
//        $i7_length = strlen($first_sample->i7_index->sequence);
//        if (count($first_sample->i5_index)>0) {
//            $i5_length = strlen($first_sample->i5_index->sequence);
//
//        }else $i5_length = 0;
//
//        foreach ($batches as $batch)
//        {
//            foreach ($batch->samples as $sample)
//            {
//                if (strlen($sample->i7_index->sequence) != $i7_length)
//                {
//                    $errors =true;
//                }
//                if (count($sample->i5_index)>0 )
//                {
//                    if (strlen($sample->i5_index->sequence) != $i5_length)
//                    {
//                        $errors = true;
//                    }
//                    $current_sequnce = $sample->i7_index->sequence." ".$sample->i5_index->sequence;
//
//                }else
//                {
//                    if ($i5_length != 0) {
//                        $errors = true;
//                    }
//                    $current_sequnce = $sample->i7_index->sequence;
//                }
//                if (array_key_exists ($current_sequnce,$sequnces)){
//                     $errors = true;
//                }else{
//                    $sequnces[$current_sequnce]=1;
//                }
//
//
//            }
//        }
//
//        dd("errors",$errors,"i5",$i5_length,"i7",$i7_length,$first_sample);
//        if (!$errors) {
//            foreach ($batches as $batch) {
//                foreach ($batch->samples as $sample) {
//                    if ($sample->runs_remaining > 0) {
//                        $sampleRun = new SampleRun();
//                        $sampleRun->created_at = Carbon::now();
//                        $sampleRun->updated_at = Carbon::now();
//                        $sampleRun->run_id = $run->id;
//                        $sampleRun->sample_id = $sample->id;
//                        $sampleRun->save();
//                        $sample->runs_remaining -= 1;
//                        $sample->update();
//                    }
//                }
//            }
//        }
//
//        return redirect('runs');
//    }

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

    public function store(BatchIdRequest $input)
    {

        $this->middleware('super');

        $batch_ids = $input->batch_check_id;

        Session::put('run_batch_ids', $batch_ids);

        return redirect('runDetails/create');
    }

    public function exportRuns()
    {

    }
}
