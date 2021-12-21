<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opinion extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'descripcion',
        'foto',
        'puntuacion'
    ];
    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}
