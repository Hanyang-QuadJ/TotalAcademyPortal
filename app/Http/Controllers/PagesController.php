<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class PagesController extends Controller
{
    public function index() {
      return view('pages.dashboard');
    }

    public function student() {
      return view('pages.students');
    }

    public function teacher() {
      return view('pages.teacher');
    }

    public function lecture() {
      return view('pages.lecture');
    }
}
