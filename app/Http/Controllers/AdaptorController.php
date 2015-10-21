<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adaptor;
use App\Http\Requests\AdaptorRequest;

// Allows the creation of new Adaptor
// and displaying a list of ones available
class AdaptorController extends Controller
{
    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/AdaptorRequest.php"
    */

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super', ['except' => ['index']]);
    }

    /**
     * Display a listing of Adaptors in system.
     *
     *
     */
    public function index()
    {
        $adaptors = Adaptor::all();

        return view('adaptor.index', [
            'adaptors'  => $adaptors,

        ]);
    }

    /**
     * Show the form for creating a new Adaptor.
     *
     *
     */
    public function create()
    {
        // get all current Adaptors from database
        $adaptors = Adaptor::all();

        // get default adaptor from database
        $defaults=[ '1'=>'True', '0'=>'False'];

        return view('adaptor.create', [
            'defaults'   => $defaults,
            'adaptors'  => $adaptors,

        ]);
    }

    /**
     * Store a newly created Adaptor in the database
     *
     * @param AdaptorRequest|Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdaptorRequest $request)
    {
        $input = $request->all();
        $adaptor = new Adaptor($input);
        // If the new Adaptor is to be the default one
        if ($adaptor->default ==1)
        {
            // Set all others existing as not being default in database
            $adaptors = Adaptor::all();
            foreach($adaptors as $adapt)
            {
                $adapt->default =0;
                $adapt->update();
            }

        }

        // save the new Adaptor
        $adaptor->save();


        return redirect('adaptor/create');
    }

}
