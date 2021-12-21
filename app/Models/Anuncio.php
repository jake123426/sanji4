<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'ubicacion',
        'puntuacion',
        'estado',
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function etiqueta()
    {
        return $this->hasMany(Tag::class);
    }

    public function opinion()
    {
        return $this->hasMany(Opinion::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imagen()
    {
        return $this->hasMany(imagen::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
