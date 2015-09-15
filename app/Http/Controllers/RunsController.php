<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Requests\RunRequest;
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
use App\Run;
use Illuminate\Http\Response;

class RunsController extends Controller
{

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/RunRequest.php"
    */

    /**
     * Display a listing of Runs.
     *
     * @return Response
     */
    public function index()
    {
        // Show 10 latest samples
        $runs = Run::orderBy('created_at', 'DESC')->take(10)->get();

        return view('runs.index', ['runs' => $runs]);
    }

    /**
     * Show the form for creating a new Run.
     *
     * @return Response
     */
    public function create()
    {

        $this->middleware('super');

        $dates = array( '0'=>Carbon::now()->format('d-m-Y'),
                        '1'=>Carbon::now()->addDays(1)->format('d-m-Y'),
                        '2'=>Carbon::now()->addDays(2)->format('d-m-Y'),
                        '3'=>Carbon::now()->addDays(3)->format('d-m-Y'),
                        '4'=>Carbon::now()->addDays(4)->format('d-m-Y'),
                        '5'=>Carbon::now()->addDays(5)->format('d-m-Y'),
                        '6'=>Carbon::now()->addDays(6)->format('d-m-Y'),
                        '7'=>Carbon::now()->addDays(7)->format('d-m-Y')
        );
/*
        $adaptor = Adaptor::lists('value', 'default', 'id');
        $iem_file_version = Iem_file_version::lists('file_version', 'default', 'id');
        $application = Application::lists('application', 'default', 'id');
        $chemistry = Chemistry::lists('chemistry', 'default', 'id');
        $run_status = Run_status::lists('status', 'default', 'id');
        $instrument = Instrument::lists('name','id');

        $work_flow = Work_flow::lists('value','id','default');
        $assay = Assay::lists('name', 'default', 'id');
         'work_flow' => Work_flow::lists('value','id'),
        $sampleRun = SampleRun::lists('run_id', 'sample_id');
        $projectGroup = ProjectGroup::lists('name', 'id');
*/
      //  $work_flow = DB::table('work_flow')->select('value','id')->orderBy('default');
       // $work_flow = $work_flow->lists();

        $default_chemistry = DB::table('chemistry')->where('default', 1)->first();
        $default_adaptor = DB::table('adaptor')->where('default', 1)->first();
        $default_iem_file_version = DB::table('iem_file_version')->where('default', 1)->first();
        $default_application = DB::table('application')->where('default', 1)->first();
        $default_assay = DB::table('assay')->where('default', 1)->first();
        $default_work_flow = DB::table('work_flow')->where('default', 1)->first();
        $default_run_status = DB::table('run_status')->where('default', 1)->first();

        return view('runs.create', [
            'adaptor' => Adaptor::lists('value',  'id'),
            'iem_file_version' => Iem_file_version::lists('file_version', 'id'),
            'application' => Application::lists('application', 'id'),
            'chemistry' => Chemistry::lists('chemistry',  'id'),
            'run_status' => Run_status::lists('status',  'id'),
            'instrument' => Instrument::lists('name','id'),
            'work_flow' => Work_flow::lists('value','id'),
            'assay' => Assay::lists('name',  'id'),
            'run_date'=> $dates,
            'sampleRun' => SampleRun::lists('run_id', 'sample_id'),
            'projectGroup' => ProjectGroup::lists('name', 'id'),

            'default_chemistry_id' => $default_chemistry->id,
            'default_adaptor_id' => $default_adaptor->id,
            'default_iem_file_version_id' => $default_iem_file_version->id,
            'default_application_id' => $default_application->id,
            'default_assay_id' =>  $default_assay->id,
            'default_work_flow_id' => $default_work_flow->id,
            'default_run_status_id' => $default_run_status->id,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RunRequest|Request $request
     * @return Response
     */
    public function store(RunRequest $request)
    {


        $request->attributes('adaptor');
        $id = Auth::user()->id;
        $run = new Run;
        $run->project_group_id = $request->get('project_group_id');
        $run->users_id = $id;
        $run->application_id = $request->get('application_id');
        $run->instrument_id = $request->get('instrument_id');
        $run->iem_file_version_id = $request->get('iem_file_version_id');
        $run->experiment_name = $request->get('experiment_name');
        $run->work_flow_id = $request->get('work_flow_id');
        $run->assay_id = $request->get('assay_id');
        $run->description  = $request->get('description');
        $run->chemistry_id = $request->get('chemistry_id');
        $run->read1 = $request->get('read1');
        $run->read2 = $request->get('read2');
        $run->single_double = 1;
        $run->run_date = Carbon::now()->addDays($request->get('run_date'));
      //  $run->single_double = $request->get('single_double');
        $run->flow_cell = $request->get('flow_cell');
        $run->adaptor_id = $request->get('adaptor_id');
        $run->run_status_id = $request->get('run_status_id');
        $run->created_at = Carbon::now();

        $run->updated_at = Carbon::now();

        $run->save();

        //return \Redirect::route('runs.create', array($run))->with('message', 'Your list has been created!');
        return redirect('runs/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        // Show 10 latest samples
        $runs = Run::orderBy('created_at', 'DESC')->take(10)->get();


        return view('runs.index', ['runs' => $runs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $run = Run::where('id', $id)->first();
        $status_options = Run_status::lists('status', 'id');
     //   $run->sample_runs;
        return view('runs.edit', [
            'run' => $run,
            'status_options' => $status_options
        ]);
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

    }

    /**
     * @param Request $request
     * @return string
     */
    public function setStatus(Request $request)
    {
        $input = $request->all();
        $run = Run::where('id', $input['run_id'])->first();



        // existing run status is either run built or run succeeded and new value is run failed
        // increment all samples in run by one
        if(($run->run_status_id ==1 ||$run->run_status_id ==1)&&  $input['run_status']==3)
        {
            $samples = DB::table('samples')->select('samples.id','runs_remaining')
                ->join('sample_runs', function ($join) {
                    $join->on('samples.id','=', 'sample_runs.sample_id');
                })
                ->join('runs', function ($join) {
                    $join->on('runs.id','=', 'sample_runs.run_id');
                })
                ->where('runs.id', '=', $input['run_id'])
                ->get();


            foreach ($samples as $sample)
            {
                DB::table('samples')
                    ->where('id', $sample->id)
                    ->update(['runs_remaining' => ($sample->runs_remaining -1)]);
            }
        }

        $run->run_status_id = $input['run_status'];


        $run->update();

        return redirect('runs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     */
    public function destroy($id)
    {
        //
    }
}
