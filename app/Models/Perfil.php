<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = ['Descripcion', 'Telefono', 'FechaNacimiento', 'Direccion', 'Empresa', 'Horario'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
