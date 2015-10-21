<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkFlowRequest;
use App\Work_flow;

class WorkFlowController extends Controller
{
    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/WorkFlowRequest.php"
    */

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $workflows = Work_Flow::all();

        return view('workflow.index', [
            'workflows'  => $workflows,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $workflows = Work_flow::all();

        $defaults=[ '1'=>'True', '0'=>'False'];

        return view('workflow.create', [
            'defaults'   => $defaults,
            'workflows'  => $workflows,

        ]);
    }

    /**
     * Store a newly created WorkFlow in database
     *
     */
    public function store(WorkFlowRequest $request)
    {
        $input = $request->all();
        $workflow = new Work_flow($input);
        // If the new WorkFlow is to be the default one
        if ($workflow->default ==1)
        {
            // Set all others existing as not being default in database
            $workflows = Work_flow::all();
            foreach($workflows as $workflw)
            {
                $workflw->default =0;
                $workflw->update();
            }
        }

        // save new WorkFlow
        $workflow->save();

        return redirect('workflow/create');
    }

}
