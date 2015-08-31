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

class SamplesController extends Controller
{

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $samples = Sample::all();
        return view('samples.index', ['samples' => $samples]);
    }

    public function create()
    {
        $iSet = IndexSet::lists('name', 'id');
        $iAll = IndexSet::all();

        return view('samples.create', [
            'iSet' => $iSet,
            'iAll' => $iAll,
        ]);
    }

    public function store(SampleRequest $request)
    {
        $input = $request->all();

        // Dummy data to satisfy NOT NULL constraints
        $input['batch_id'] = 1;

        // Check input here

        // TODO: Add new batch then add sample to the batch
        $batch = new Batch();
        $sample = new Sample($input);

        // Add the authenticated user as the sample creator
        //\Auth::user()->samples()->save($sample);
        // Should it now be this as user is stored in batch?
        \Auth::user()->batches()->save($batch);

        $sample->save();

        return redirect('samples');
    }

    public function show(Sample $sample)
    {
        return view('samples.show', compact('sample'));
    }

    public function edit(Sample $sample)
    {
        return view('samples.edit', compact('sample'));
    }

    public function update(Sample $sample, SampleRequest $request)
    {
        $sample->update($request->all());

        return redirect('samples');
    }
}
