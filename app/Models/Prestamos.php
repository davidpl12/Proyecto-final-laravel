<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_user',
        'id_libro',
        'fecha'
    ];

    public function own_user(){
        return $this->belongsTo(User::class);
    }
    public function own_libro(){
        return $this->belongsTo(Libros::class);
    }
}
