<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RunRequest;
use App\Http\Controllers\Controller;
use App\Application;
use App\Chemistry;
use App\Run_status;
use App\Instrument;
use App\Iem_file_version;
use App\Work_flow;
use App\Assay;
use App\Adaptor;
use App\SampleRun;
use App\ProjectGroup;

class RunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return "runs index";
    }

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $this->middleware('super');

        $adaptor = Adaptor::lists('value', 'id');
        $iem_file_version = Iem_file_version::lists('file_version', 'id');
        $application = Application::lists('application', 'id');
        $chemistry = Chemistry::lists('chemistry', 'id');
        $run_status = Run_status::lists('status', 'id');
        $instrument = Instrument::lists('name', 'id');

        $work_flow = Work_flow::lists('value', 'id');
        $assay = Assay::lists('name', 'id');

        $sampleRun = SampleRun::lists('run_id', 'sample_id');
        $projectGroup = ProjectGroup::lists('name', 'id');


        return view('runs.create', [

            'adaptor' => $adaptor,
            'iem_file_version' => $iem_file_version,
            'application' => $application,
            'chemistry' => $chemistry,
            'run_status' => $run_status,
            'instrument' => $instrument,
            'work_flow' => $work_flow,
            'assay' => $assay,

            'sampleRun' => $sampleRun,
            'projectGroup' => $projectGroup
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(RunRequest $request)
    {
        $input = $request->all();


        dd($input);
        return "Runs store controller";

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return view('runs.show', compact('runs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
