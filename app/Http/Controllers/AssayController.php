<?php

namespace App\Http\Controllers;

use App\Assay;
use Illuminate\Http\Request;

use App\Http\Requests\AssayRequest;
use App\Http\Controllers\Controller;

// Allows the creation of new Assay
// and displaying a list of ones available
class AssayController extends Controller
{
    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/AssayRequest.php"
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
     * @return Response
     */
    public function index()
    {
        $assays = Assay::all();

        return view('assay.index', [
            'assays'  => $assays,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $assays = Assay::all();

        $defaults=[ '1'=>'True', '0'=>'False'];

        return view('assay.create', [
            'defaults'   => $defaults,
            'assays'  => $assays,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(AssayRequest $request)
    {
        $input = $request->all();
        $assay = new Assay($input);
        // If the new Assay is to be the default one
        if ($assay->default ==1)
        {
            // Set all others existing as not being default in database
            $assays = Assay::all();
            foreach($assays as $ass)
            {
                $ass->default =0;
                $ass->update();
            }
        }

        $assay->save();

        return redirect('assay/create');
    }
}
