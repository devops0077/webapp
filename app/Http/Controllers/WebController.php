<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    // signature of a functio =n or messenger - scope, name and arguemenr and or parameters
    public function homepage()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }
}
