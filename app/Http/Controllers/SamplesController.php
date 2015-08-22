<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SampleRequest;
use App\Http\Controllers\Controller;
use App\Sample;
use Illuminate\Http\Request;

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
//        return view('samples.index')->with(compact($samples));
        return view('samples.index')->with('samples', $samples);
//        return view('samples', $samples);
    }

    public function create()
    {
        return view('samples.create');
    }

    public function store(SampleRequest $request)
    {
        $input = $request->all();

        // Dummy data to satisfy NOT NULL constraints
        $input['batch_id'] = 1;

        // Check input here

        $sample = new Sample($input);

        // Add the authenticated user as the sample creator
        \Auth::user()->samples()->save($sample);

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
