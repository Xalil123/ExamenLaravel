<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = [
        'texte',
        'auteur_id',
        'task_id'
    ];
}
