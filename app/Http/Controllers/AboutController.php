<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adaptor;
use App\Http\Requests\AdaptorRequest;

// Displays the about information page.
// Controller only required to maintain a consistent design pattern
class AboutController extends Controller
{

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {

        return view('about', [

        ]);
    }




}
