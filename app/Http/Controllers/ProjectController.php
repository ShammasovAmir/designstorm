<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        return view('account.projects.index');
    }
    
    public function create() {
        return view('account.projects.create');
    }
    
    public function store() {
        return 'Store Project';
    }
    
    public function show() {
        return view('account.projects.show');
    }
    
    public function edit() {
        return view('account.projects.edit');
    }
    
    public function update() {
        return 'Update Project';
    }
    
    public function destroy() {
        return 'Delete Project';
    }
}
