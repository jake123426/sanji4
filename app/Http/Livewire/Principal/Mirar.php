<?php

namespace App\Http\Livewire\Principal;

use App\Models\User;
use App\Models\Opinion;
use Livewire\Component;
use App\Models\Anuncio;
use App\Models\Bitacora;

class Mirar extends Component
{
    public $anuncio;
    public $tags;
    public $search;
    public $verif;
    public $puntuacion;
    public $descripcion;
    public $cant_opiniones;
    public $star;

    protected $listeners = ['renderizacion' => '$refresh'];
    public function render()
    {
        foreach ($this->anuncio->opinion as $uno) {

            $user = User::find($uno->user_id);
            $uno['foto'] = $user->url;
            $uno['nombre'] = $user->name;
        }

        $imagenes = $this->anuncio->imagen()->get();
        $opiniones = $this->anuncio->opinion;
        $this->cant_opiniones = $opiniones->count();
        $this->star = $this->anuncio->puntuacion;
        return view('livewire.principal.mirar', compact('imagenes', 'opiniones'));
    }

    public function guardaropinion($id)
    {
        /* $usernombre = auth()->user()->name;
        $userfoto = auth()->user()->profile_photo_url; */
        $crearopiniones = new Opinion();
        /* $crearopiniones->nombre = ucwords($usernombre);
        $crearopiniones->foto = $userfoto; */
        $crearopiniones->user_id = auth()->user()->id;
        $crearopiniones->descripcion = ucwords($this->descripcion);
        $crearopiniones->puntuacion = $this->puntuacion;
        $crearopiniones->anuncio_id = $id;
        $crearopiniones->save();

        $anun = Anuncio::find($id);
        $anun->puntuacion = $anun->puntuacion + $this->puntuacion;
        $anun->puntuacion = $anun->puntuacion / $anun->opinion()->count();
        $anun->save();


        $date = date('H:i:s');
        Bitacora::create(['nombre' => auth()->user()->name, 'accion' => ' Crear Opinion De Un Anuncio ', 'descripcion' => 'El Usuario Hizo Un Comentario Del El Anuncio ' . $anun->nombre, 'hora' => $date, 'fecha' => date('Y-m-d'), 'user_id' => auth()->user()->id,]);
        $this->descripcion = "";
        $this->puntuacion = "";
        $this->emit('renderizacion');
    }

    public function favoritos($id)
    {
        $anuncio = Anuncio::find($id);
        $user = auth()->user()->id;
        $anuncio->users()->sync($user);
        $this->verif = 1;

        $date = date('H:i:s');
        Bitacora::create(['nombre' => auth()->user()->name, 'accion' => ' Guardar Anuncio En Favoritos ', 'descripcion' => 'El Usuario Guardo En Favoritos El Anuncio  ' . $anuncio->nombre, 'hora' => $date, 'fecha' => date('Y-m-d'), 'user_id' => auth()->user()->id,]);
        $this->emit('renderizacion');
    }

    public function nofavoritos($id)
    {
        $anuncio = Anuncio::find($id);
        $user = User::find(auth()->user()->id);
        $user->favoritos()->detach($anuncio->id);
        $this->verif = 0;

        $date = date('H:i:s');
        Bitacora::create(['nombre' => auth()->user()->name, 'accion' => ' Borrar El Anuncio De Favoritos ', 'descripcion' => 'El Usuario Borro De Favorito El Anuncio  ' . $anuncio->nombre, 'hora' => $date, 'fecha' => date('Y-m-d'), 'user_id' => auth()->user()->id,]);
        $this->emit('renderizacion');
    }
}
