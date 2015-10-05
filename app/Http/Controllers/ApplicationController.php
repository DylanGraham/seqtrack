<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

use App\Http\Requests\ApplicationRequest;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $application = Application::all();

        return view('application.index', [
            'applications'  => $application,

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $application = Application::all();

        $defaults=[ '1'=>'True', '0'=>'False'];

        return view('application.create', [
            'defaults'   => $defaults,
            'applications'  => $application,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ApplicationRequest $request)
    {
        $input = $request->all();
        $application = new Application($input);
        if ($application->default ==1)
        {
            $applications = Application::all();
            foreach($applications as $app)
            {
                $app->default =0;
                $app->update();
            }

        }

        $application->save();

        return redirect('application/create');
    }

}
