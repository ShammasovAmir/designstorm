<?php

namespace App\Http\Controllers;

use App\Project;

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

        return view('account.dashboard', compact('projects', 'projects_total'));
    }
}
