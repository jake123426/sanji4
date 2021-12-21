<?php

namespace App\Http\Livewire\Principal;
use App\Models\User;
use App\Models\Suscripcion;
use Livewire\Component;

class Suscripciones extends Component
{

    protected $listeners = ['renderizacion' => '$refresh'];
  
    public function render()
    {
        return view('livewire.principal.suscripciones');
    }

}
