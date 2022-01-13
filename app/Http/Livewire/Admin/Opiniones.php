<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Opiniones extends Component
{

    public function render()
    {
        $coment = [];
        $anuncios = User::find(auth()->user()->id)->anuncio()->get();
        foreach ($anuncios as $anuncio){
            foreach ($anuncio->opinion()->get() as $opinion){
                $user = User::find($opinion->user_id);
                $opinion['foto'] = $user->url;
                $opinion['nombre'] = $user->name;
                $coment[] = $opinion;
            }
        }

        $opiniones=User::find(auth()->user()->id)->anuncio()->get();
        return view('livewire.admin.opiniones',compact('opiniones', 'coment'));
    }
}
