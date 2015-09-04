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

class SamplesController extends Controller
{

/*
 *  For custom error messages see "resources/lang/en/validation.php"
 *
 *  For validation see "Http/Requests/SampleRequest.php"
 */


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

          // Check input here

        $sample = new Sample($input);

        // i5_index_id returned as name from form if null
        if ($sample->i5_index_id == 'name')
            $sample->i5_index_id = null;

        $sample->save();

        return redirect('samples');
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

//        return view('samples.edit', compact('sample'));
    }

    public function update(Sample $sample, SampleRequest $request)
    {
        $sample->update($request->all());

        return redirect('samples');
    }
}
