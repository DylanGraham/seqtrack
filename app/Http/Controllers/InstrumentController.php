<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\InstrumentRequest;
use App\Http\Controllers\Controller;
use App\Instrument;
class InstrumentController extends Controller
{
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


        return redirect('instrument');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
