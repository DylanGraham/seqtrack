<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IndexSet;
use App\I7Index;

class IndexController extends Controller
{
    public function getI7IndexFromSet($id)
    {
        $data = IndexSet::find($id)->I7Indexes()->get();
        return $data;
    }

    public function getI5IndexFromSet($id)
    {
        $data = IndexSet::find($id)->I5Indexes()->get();
        return $data;
    }

    public function test()
    {
        $I7 = I7Index::all();
        return view('testing', ['I7' => $I7]);
    }
}
