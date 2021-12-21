<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Suscripcion;
class ListaSuscripcion extends Component
{
    public function render()
    {
        $suscripciones=Suscripcion::all();
        return view('livewire.admin.lista-suscripcion',compact('suscripciones'));
    }
}
