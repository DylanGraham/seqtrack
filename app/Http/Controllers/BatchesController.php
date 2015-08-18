<?php

namespace App\Http\Controllers;

use App\Http\Requests;
//use App\Http\Requests\BatchesRequest;
use App\Http\Controllers\Controller;
use App\Batch;
use Illuminate\Http\Request;

class BatchesController extends Controller
{

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super');
    }

    public function index()
    {
        $batches = Batch::all();
        return view('batches')->with('batches', $batches);
        //return view('batches', $batches);
    }

    public function create()
    {
        return view('batches.create');
    }

// Removed until BatchesRequest validation is created
//    public function store(BatchRequest $request)
    public function store()
    {
        $input = $request->all();

        // Check input here

        $batch = new Batch($input);

        // Add the authenticated user as the batch creator
        \Auth::user()->batches()->save($batch);

        return redirect('batches');
    }

    public function show($id)
    {
//        $batches = Batch::findOrFail($id);
//        return view('batches', compact('batches'));
    }

    public function edit($id)
    {
        $batch = Batch::findOrFail($id);
        return view('batches.edit', compact('batch'));
    }

// Removed until BatchesRequest validation is created
//    public function update($id, BatchesRequest $request)
    public function update($id)
    {
        $batch = Batch::findOrFail($id);       
        $batch->update($request->all());

        return redirect('batches');
    }
}
