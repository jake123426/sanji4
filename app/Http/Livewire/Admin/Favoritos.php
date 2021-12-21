<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;
use Livewire\Component;

class Favoritos extends Component
{
    public function render()
    {
        $user=User::find(auth()->user()->id);
        $anuncios=$user->favoritos()->get();
        return view('livewire.admin.favoritos',compact('anuncios'));
    }
}
