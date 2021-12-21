<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
    ];

    public function anuncio()
    {
        return $this->hasMany(Anuncio::class);
    }

    public function subcategoria()
    {
        return $this->hasMany(Subcategoria::class);
    }
}
