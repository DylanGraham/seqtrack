<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    // Restrict access to authenticated users
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['closed']]);
    }

    public function index()
    {
        return view('index');
    }

    public function closed()
    {
        return view('closed');
    }
}
