<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\History;
class PagesController extends Controller
{
    public function index() {
        $histories = History::all();
        return view('pages.dashboard',compact('histories'));
    }

    // public function student() {
    //   return view('pages.student');
    // }
    //
    // public function teacher() {
    //   return view('pages.teacher');
    // }
    //
    // public function lecture() {
    //   return view('pages.lecture');
    // }
}
