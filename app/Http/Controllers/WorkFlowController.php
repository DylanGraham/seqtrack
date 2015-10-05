<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\WorkFlowRequest;
use App\Http\Controllers\Controller;
use App\Work_flow;

class WorkFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @return Response
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
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(WorkFlowRequest $request)
    {
        $input = $request->all();
        $workflow = new Work_flow($input);
        if ($workflow->default ==1)
        {
            $workflows = Work_flow::all();
            foreach($workflows as $workflw)
            {
                $workflw->default =0;
                $workflw->update();
            }

        }

        $workflow->save();


        return redirect('workflow/create');
    }

}
