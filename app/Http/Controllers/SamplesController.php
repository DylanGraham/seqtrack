<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SampleRequest;
use App\Http\Controllers\Controller;
use App\Sample;
use Illuminate\Http\Request;

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

    public function store(SampleRequest $request)
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

    public function update($id, SampleRequest $request)
    {
        $sample = Sample::findOrFail($id);       
        $sample->update($request->all());

        return redirect('samples');
    }
}
