<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SampleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $this->middleware('super', ['except' => ['index', 'create', 'store', 'show']]);
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
        $pg = ProjectGroup::lists('name', 'id');
        $user = Auth::user();
        $batches = $user->batches->lists('batch_name', 'id');

 
       return view('samples.create', [
            'iSet'  => $iSet,
            'iAll'  => $iAll,
            'pg'    => $pg,
            'user'  => $user,
            'batches' => $batches,
        ]);
    }

    public function store(SampleRequest $request)
    {
        $input = $request->all();

        $sample = new Sample($input);

        // i5_index_id returned as name from form if null
        if ($sample->i5_index_id == 'name') {
            $sample->i5_index_id = null;
        }

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

        return view('samples.edit', [
            'iSet'  => $iSet,
            'iAll'  => $iAll,
            'pg'    => $pg,
            'sample'=> $sample,
        ]);
    }

    public function update(Sample $sample, SampleRequest $request)
    {
        $sample->update($request->all());

        return redirect('samples');
    }

    public function checkBatchCompatibility(Sample $sample)
    {
        if ($sample->i5_index_id) {
            $i5 = $sample->i5_index->index_set_id;
        }
        $i7 = $sample->i7_index->index_set_id;
        $currentIndexSet = IndexSet::find($i7);
        $batch = Batch::find($sample->batch_id);
        if (count($batch->samples)) {
            foreach ($batch->samples as $s) {
                $checkSet = $s->i7_index->index_set_id;

                // If using dual index when batch is single
                if ($sample->i5_index_id && ! $s->i5_index_id) {
                    Session::flash('flash_message', 'Batch is single index!');
                    return false;
                // Or vice cersa
                } elseif ($s->i5_index_id && ! $sample->i5_index_id) {
                    Session::flash('flash_message', 'Batch is dual index!');
                    return false;
                }

                // If both i7 & i5 are already used 
                if ($s->i5_index_id) {
                    if ($s->i7_index_id == $i7 && $s->i5_index_id == $i5) {
                        Session::flash('flash_message', 'Both indexes conflict!');
                        return false;
                    } 
                // If single index but i7 is used
                } elseif ($s->i7_index_id == $i7) {
                    Session::flash('flash_message', 'Index conflict!');
                    return false;
                }                

                // Must be from the same index set
                if ($currentIndexSet->id != $checkSet) {
                    //dd($currentIndexSet->id, $checkSet);
                    Session::flash('flash_message', 'Index set mismatch!');
                    return false;
                }
            }
        }
        Session::flash('success_message', 'Sample added');
        return true;
    }
}
