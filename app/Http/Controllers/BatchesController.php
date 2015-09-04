<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\BatchRequest;
use App\Http\Controllers\Controller;
use App\Batch;
use App\ProjectGroup;

class BatchesController extends Controller
{
    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/BatchRequest.php"
    */

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('super' ['except' => ['index', '' ]]);
    }

    public function index()
    {
        $batches = Batch::all();
        return view('batches.index')->with('batches', $batches);
    }

    public function create()
    {
        $pg = ProjectGroup::lists('name', 'id');

        return view('batches.create', [
            'pg'    => $pg,
        ]);
    }

    public function store(BatchRequest $request)
    {
        $input = $request->all();

        // Check input here
        $batch = new Batch($input);

        // Add the authenticated user as the batch creator
        \Auth::user()->batches()->save($batch);

        return redirect('batches');
    }

    public function show(Batch $batch)
    {
//        $batches = Batch::findOrFail($id);
//        return view('batches', compact('batches'));
    }

    public function edit(Batch $batch)
    {
        /* Should user be creator of batch to edit?
           Probably either 'creator || super'  */
        return view('batches.edit', compact('batch'));
    }

// Removed until BatchesRequest validation is created
//    public function update(Batch $batch, BatchesRequest $request)
    public function update(Batch $batch)
    {
        $batch->update($request->all());

        return redirect('batches');
    }
}
