<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\InstrumentRequest;
use App\Http\Controllers\Controller;
use App\Instrument;
class InstrumentController extends Controller
{
    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $instruments = Instrument::all();

        return view('instrument.index', [
            'instruments'  => $instruments ,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $instruments = Instrument::all();

        return view('instrument.create', [
            'instruments'  => $instruments ,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(InstrumentRequest $request)
    {
        $input = $request->all();
        $instrument = new Instrument($input);

        $instrument->save();


        return redirect('instrument/create');
    }
}
