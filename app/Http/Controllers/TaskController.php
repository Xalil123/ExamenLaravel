<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show($id)
    {
        return Task::with('comments')->findOrFail($id);
    }

    public function store(Request $request)
    {
        return Task::create($request->all());
    }
}
