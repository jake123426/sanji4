<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tarjeta',
        'numero_tarjeta',
        'fecha_tarjeta',
        'ccv',
        'fecha_inicio',
        'fecha_fin',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
