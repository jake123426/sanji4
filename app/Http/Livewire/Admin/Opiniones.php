<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Opiniones extends Component
{

    public function render()
    {
        $opiniones=User::find(auth()->user()->id)->anuncio()->get();
        return view('livewire.admin.opiniones',compact('opiniones'));
    }
}
