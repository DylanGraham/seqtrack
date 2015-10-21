<?php

namespace App\Http\Controllers;

use App\Application;

use App\Http\Requests\ApplicationRequest;

// Allows the creation of new Application
// and displaying a list of ones available
class ApplicationController extends Controller
{
    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/ApplicationRequest.php"
    */

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super', ['except' => ['index']]);
    }

    /**
     * Display a listing of Application's in system
     *
     *
     */
    public function index()
    {
        $application = Application::all();

        return view('application.index', [
            'applications'  => $application,

        ]);

    }

    /**
     * Show the form for creating a new Application in system.
     *
     *
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
     * Store a newly created Application in database.
     *
     */
    public function store(ApplicationRequest $request)
    {
        $input = $request->all();
        $application = new Application($input);
        // If the new Application is to be the default one
        if ($application->default ==1)
        {
            // Set all others existing as not being default in database
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
