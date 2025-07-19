<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
  public function index()
    {
        return Project::with('tasks')->get();
    }

    public function store(Request $request)
    {
        return Project::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'owner_id' => auth()->id(),
        ]);
    }}
