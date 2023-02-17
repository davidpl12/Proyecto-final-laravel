<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libros extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titulo',
        'autor',
        'categoria',
        'resena',
        'editorial',
        'foto'
    ];

 }
