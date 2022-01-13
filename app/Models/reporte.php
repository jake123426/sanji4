<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporte extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'nombre_reportado', 'anuncio', 'fecha', 'reporte', ];
}
