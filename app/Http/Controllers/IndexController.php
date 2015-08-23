<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IndexSet;

class IndexController extends Controller
{
    public function getIndexFromSet($id)
    {
        $data = IndexSet::find($id)->I7Indexes()->get();
        return $data;
    }
}
