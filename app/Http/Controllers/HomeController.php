<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academies = Academy::all();
        return view('home',compact('academies'));
    }
}
