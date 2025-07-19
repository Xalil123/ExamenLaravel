<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
 protected $fillable = [
        'titre',
        'description',
        'etat',
        'deadline',
        'project_id',
        'assigned_to'
    ];}
