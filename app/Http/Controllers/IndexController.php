<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IndexSet;

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
}
