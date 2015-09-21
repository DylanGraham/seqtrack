<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\BatchRequest;
use App\Http\Requests\BatchEditRequest;
use App\Batch;
use App\ProjectGroup;
use Carbon\Carbon;

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

        $batches = Batch::orderBy('created_at','desc')->get();
        return view('batches.index')->with('batches', $batches);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pg = ProjectGroup::lists('name', 'id');
        $charge = \Auth::user()->default_charge_code;
        $my_group = \Auth::user()->default_project_id;

        return view('batches.create', [
            'pg'    => $pg,
            'charge'=> $charge,
            'my_group' => $my_group,
        ]);
    }

    public function store(BatchRequest $request)
    {
        $input = $request->all();

        // Check input here
        $batch = new Batch($input);
        $batch->created_at = Carbon::now();
        $batch->updated_at = Carbon::now();

        // Add the authenticated user as the batch creator
        \Auth::user()->batches()->save($batch);

        return redirect('batches');
    }

    public function show(Batch $batch)
    {
        return view('batches.show')->with('batch', $batch);
    }

    public function edit(Batch $batch)
    {
        /* Should user be creator of batch to edit?
           Probably either 'creator || super'  */
        $pg = ProjectGroup::lists('name', 'id');
        $charge = $batch->charge_code;
        $my_group = $batch->project_group_id;

        return view('batches.edit', [
            'batch'     => $batch,
            'pg'        => $pg,
            'charge'    => $charge,
            'my_group'  => $my_group,
        ]);
    }

    public function update(Batch $batch, BatchEditRequest $request)
    {
        $batch->update($request->all());
        return redirect('batches');
    }
}
