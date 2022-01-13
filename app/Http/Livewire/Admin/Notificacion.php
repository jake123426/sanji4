<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Notifications\notificaciones;
use App\Models\User;
class Notificacion extends Component
{
    public $descripcion;
    public function render()
    {
        return view('livewire.admin.notificacion');
    }
    public function notificar(){
        $users=User::all()->except(auth()->user()->id);
        foreach($users as  $user){
            $user->notify(new notificaciones($this->descripcion));
        }
        redirect()->route('mensaje');
    }
}
