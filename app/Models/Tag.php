<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
    ];
    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}
