<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SampleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sample;
use App\I7IndexSet;
use App\I7Index;
use App\I5IndexSet;
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
        $i7Set = I7IndexSet::lists('name', 'id');
        $i5Set = I5IndexSet::lists('name', 'id');
        $i7All = I7IndexSet::all();
        $i5All = I5IndexSet::all();

        return view('samples.create', [
            'i7Set' => $i7Set,
            'i5Set' => $i5Set,
            'i7All' => $i7All,
            'i5All' => $i5All,
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
