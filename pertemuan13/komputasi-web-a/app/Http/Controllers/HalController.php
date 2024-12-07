<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalController extends Controller
{
    public function index()
    {
        return view('home1'); 
    }

    public function about()
    {
        return view('about1');
    }

    public function contact()
    {
        return view('contact1');
    }
}
