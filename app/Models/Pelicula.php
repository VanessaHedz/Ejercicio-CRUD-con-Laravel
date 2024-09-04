<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    protected $table = 'catalogo';

    protected $fillable = ['plataforma','titulo', 'tipo', 'genero', 'anio' ];
    //public $id = true;
    public $timestamps = false;
}
