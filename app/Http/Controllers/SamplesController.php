<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SampleRequest;
use App\Http\Requests\SampleEditRequest;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Batch;
use App\Sample;
use App\IndexSet;
use App\I7Index;
use App\I5Index;
use App\ProjectGroup;
use Auth;
use Session;

class SamplesController extends Controller
{

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super', ['except' => [
            'index',
            'create',
            'store',
            'show'
        ]]);
    }

    public function index()
    {
        // Show 60 latest samples
        $samples = Sample::orderBy('created_at', 'DESC')->take(60)->get();

        return view('samples.index', ['samples' => $samples]);
    }

    public function create()
    {
        $iSet = IndexSet::lists('name', 'id');
        $iAll = IndexSet::all();
        $i7 = I7Index::lists('index', 'id');
        $i5 = I5Index::lists('index', 'id');
        $pg = ProjectGroup::lists('name', 'id');
        $user = Auth::user();
        $batches = $user->batches->lists('batch_name', 'id');
 
       return view('samples.create', [
            'iSet'  => $iSet,
            'iAll'  => $iAll,
            'i7'    => $i7,
            'i5'    => $i5,
            'pg'    => $pg,
            'user'  => $user,
            'batches' => $batches,
        ]);
    }

    public function store(SampleRequest $request)
    {
        $input = $request->all();

        $sample = new Sample($input);
        // new default for this version of software
        $sample->instrument_lane =1;
        
        // Check if sample is compatible for batch
        if ($this->checkBatchCompatibility($sample)) {
            $sample->save();
        }

        return back()->withInput();
//        return redirect('samples');
    }

    public function show(Sample $sample)
    {
        return view('samples.show', compact('sample'));
    }

    public function edit(Sample $sample)
    {
        $iSet = IndexSet::lists('name', 'id');
        $iAll = IndexSet::all();
        $pg = ProjectGroup::lists('name', 'id');

        session(['edit_sample_url' => Request::server('HTTP_REFERER')]);

        return view('samples.edit', [
            'iSet'  => $iSet,
            'iAll'  => $iAll,
            'pg'    => $pg,
            'sample'=> $sample,
        ]);
    }

    public function update(Sample $sample, SampleEditRequest $request)
    {
        $sample->update($request->all());

        $url = Session::get('edit_sample_url');
        Session::forget('edit_sample_url');

        return redirect($url);
    }

    public function checkBatchCompatibility(Sample $sample)
    {

        if ($sample->i5_index_id) {
            $i5 = $sample->i5_index->index_set_id;
            $new_i5_index_id = $sample->i5_index->id;
        }
        $i7 = $sample->i7_index->index_set_id;
        $new_i7_index_id = $sample->i7_index->id;

        $currentIndexSet = IndexSet::find($i7);

        $batch = Batch::find($sample->batch_id);
        if (count($batch->samples)) {
            foreach ($batch->samples as $s) {

                // Must be from the same index set
                if ($currentIndexSet->id != $s->i7_index->index_set_id) {
                    //dd($currentIndexSet->id, $checkSet);
                    Session::flash('flash_message', "Index set mismatch! &emsp; Existing batch is ".$s->i7_index->IndexSet->name);
                    return false;
                }

                // If both i7 & i5 are already used
                if ($s->i5_index_id) {
                    if ($s->i7_index_id == $new_i7_index_id && $s->i5_index_id == $new_i5_index_id) {
                        Session::flash('flash_message', 'I7 and I5 combination already in batch');
                        return false;
                    } 
                // If single index and new i7 is already in batch
                } elseif ($s->i7_index_id == $new_i7_index_id) {
                    Session::flash('flash_message', 'Index conflict! &emsp; New I7 index already in single index batch ');
                    return false;
                }

                // If using dual index when batch is single
                if ($sample->i5_index_id && ! $s->i5_index_id) {
                    Session::flash('flash_message', 'Batch is single index! New sample is dual &emsp; Existing Index set '. $s->i7_index->IndexSet->name);
                    return false;
                    // Or vice versa
                } elseif ($s->i5_index_id && ! $sample->i5_index_id) {
                    Session::flash('flash_message', "Batch is dual index! New sample is single. &emsp; Existing Index set ". $s->i7_index->IndexSet->name);
                    return false;
                }


            }
        }
        Session::flash('success_message', 'Sample added');
        return true;
    }
}
