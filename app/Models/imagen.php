<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    use HasFactory;
    protected $fillable=[
        'url',
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}
