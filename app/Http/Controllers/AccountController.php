<?php

namespace App\Http\Controllers;

use App\Project;
use Colors\RandomColor;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::all();
        $projects_total = $projects->count();
        $colors_array = [];

        for ($i = 0; $i < $projects_total; $i++) {
            $color = RandomColor::one();
            array_push($colors_array, $color);
        }

        return view('account.dashboard', compact('projects', 'projects_total', 'colors_array'));
    }
}
