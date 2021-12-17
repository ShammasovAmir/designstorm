<?php

namespace App\Http\Controllers;

use App\Project;
use Colors\RandomColor;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::where('user_id', Auth::id())
            ->get();
        $projects_total = $projects->count();
        $colors_array = [];
        $projects_inspiration_count = [];

        for ($i = 0; $i < $projects_total; $i++) {
            $color = RandomColor::one();
            array_push($colors_array, $color);
        }

        foreach ($projects as $project) {
            $inspirations_count = 0;
            for ($i = 0; $i < $project->inspirations->count(); $i++) {
                $inspirations_count++;
            }
            array_push($projects_inspiration_count, $inspirations_count);
        }

        return view('account.dashboard', compact(
            'projects',
            'projects_total',
            'colors_array',
            'projects_inspiration_count'
        ));
    }
}
