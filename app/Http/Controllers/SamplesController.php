<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSampleRequest;
use App\Http\Controllers\Controller;
use App\Sample;

class SamplesController extends Controller
{
    public function index()
    {
        $samples = Sample::all();
        return view('samples')->with('samples', $samples);
        //return view('samples', $samples);
    }

    public function create()
    {
        return view('samples.create');
    }

    public function store(CreateSampleRequest $request)
    {
        $input = $request->all();

        // Dummy data to satisfy NOT NULL constraints
        $input['batch_id'] = 1;

        // Check input here and then store to database if correct

        Sample::create($input);
        return redirect('samples');
    }

    public function show($id)
    {
//        $samples = Sample::findOrFail($id);
//        return view('samples', compact('samples'));
    }

    public function edit($id)
    {
        $sample = Sample::findOrFail($id);
        return view('samples.edit', compact('sample'));
    }

}
