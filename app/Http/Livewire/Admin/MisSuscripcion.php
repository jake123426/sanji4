<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
class MisSuscripcion extends Component
{
    public function render()
    {
        $user=User::find(auth()->user()->id);
        $suscripciones=$user->suscripcion()->get();
        return view('livewire.admin.mis-suscripcion',compact('suscripciones'));
    }
}
