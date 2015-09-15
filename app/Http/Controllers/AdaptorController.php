<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adaptor;
use App\Http\Requests\AdaptorRequest;
use App\Http\Controllers\Controller;

class AdaptorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $adaptors = Adaptor::all();

        return view('adaptor.index', [
            'adaptors'  => $adaptors,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $adaptors = Adaptor::all();

        $defaults=[ '1'=>'True', '0'=>'False'];

        return view('adaptor.create', [
            'defaults'   => $defaults,
            'adaptors'  => $adaptors,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(AdaptorRequest $request)
    {
        $input = $request->all();
        $adaptor = new Adaptor($input);
        if ($adaptor->default ==1)
        {
            $adaptors = Adaptor::all();
            foreach($adaptors as $adapt)
            {
                $adapt->default =0;
                $adapt->update();
            }

        }

        $adaptor->save();


        return redirect('adaptor');
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
