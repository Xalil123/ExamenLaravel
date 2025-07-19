<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
   public function store($id, Request $request)
    {
        return Comment::create([
            'texte' => $request->texte,
            'auteur_id' => auth()->id(),
            'task_id' => $id,
        ]);
    }
}
