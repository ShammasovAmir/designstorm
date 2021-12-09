<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('pages.home', compact('user'));
    }

    public function results() {
        $user = Auth::user();
        return view('pages.results', compact('user'));
    }
}
