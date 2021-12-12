<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('account.projects.index', compact('projects'));
    }
    
    public function create() {
        return view('account.projects.create');
    }
    
    public function store(Request $request) {
        $project = new Project();
        $project::create($request->all());

        return redirect('account/projects');
    }
    
    public function show($id) {
        $project = Project::where('id', $id)->first();

        return view('account.projects.show', compact('project'));
    }
    
    public function edit($id) {
        $project = Project::where('id', $id)->first();

        return view('account.projects.edit', compact('project'));
    }
    
    public function update(Request $request, $id) {
        Project::where('id', $id)->update([
            "title" => $request->title
        ]);

        return back();
    }
    
    public function destroy($id) {
        Project::where('id', $id)->delete();

        return redirect('account/projects');
    }
}
