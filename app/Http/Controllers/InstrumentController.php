<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstrumentRequest;
use App\Instrument;

// Allows the creation of new Instrument
// and displaying a list of ones available
class InstrumentController extends Controller
{
    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/InstrumentRequest.php"
    */

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super', ['except' => ['index']]);
    }

    /**
     * Display a listing of Instrument's.
     *
     *
     */
    public function index()
    {
        $instruments = Instrument::all();

        return view('instrument.index', [
            'instruments'  => $instruments ,

        ]);
    }

    /**
     * Show the form for creating a new Instrument.
     *
     *
     */
    public function create()
    {
        $instruments = Instrument::all();

        return view('instrument.create', [
            'instruments'  => $instruments ,

        ]);
    }

    /**
     * Store a newly created Instrument in database.
     *
     */
    public function store(InstrumentRequest $request)
    {
        $input = $request->all();
        $instrument = new Instrument($input);

        $instrument->save();


        return redirect('instrument/create');
    }
}
