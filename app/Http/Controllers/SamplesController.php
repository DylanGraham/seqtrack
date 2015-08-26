<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SampleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sample;
use App\I7Index;
use App\I5Index;

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
        $i7 = I7Index::lists('sequence', 'id');
        $i5 = I5Index::lists('sequence', 'id');
        return view('samples.create', [
            'i7' => $i7,
            'i5' => $i5,
        ]);
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
