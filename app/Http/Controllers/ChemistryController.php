<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ChemistryRequest;
use App\Chemistry;

// Allows the creation of new Chemistry
// and displaying a list of ones available
class ChemistryController extends Controller
{
    /*
    *  For custom error messages see "resources/lang/en/validation.php"
    *
    *  For validation see "Http/Requests/ChemistryRequest.php"
    */

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super', ['except' => ['index']]);
    }
    /**
     * Display a listing of Chemistry's
     *
     *
     */
    public function index()
    {
        $chemistry = Chemistry::all();

        return view('chemistry.index', [
            'chemistry'  => $chemistry,

        ]);
    }

    /**
     * Show the form for creating a new Chemistry's.
     *
     *
     */
    public function create()
    {
        $chemistry = Chemistry::all();

        $defaults=[ '1'=>'True', '0'=>'False'];

        return view('chemistry.create', [
            'defaults'   => $defaults,
            'chemistry'  => $chemistry,

        ]);
    }

    /**
     * Store a newly created Chemistry in database.
     *
     * @param ChemistryRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ChemistryRequest $request)
    {
        $input = $request->all();
        $chemistry = new Chemistry($input);
        // If the new Chemistry is to be the default one
        if ($chemistry->default ==1)
        {
            // Set all others existing as not being default in database
            $chemistrys = Chemistry::all();
            foreach($chemistrys as $chem)
            {
                $chem->default =0;
                $chem->update();
            }

        }

        $chemistry->save();


        return redirect('chemistry/create');
    }

}
