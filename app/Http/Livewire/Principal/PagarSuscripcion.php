<?php

namespace App\Http\Livewire\Principal;

use Livewire\Component;
use App\Models\Suscripcion;
use App\Models\Bitacora;
use App\Models\User;
use App\Notifications\suscripcionNotification;
class PagarSuscripcion extends Component
{
    public $precio;
    public $tiempo;
    public $nombre;
    public $year;
    public $mes;
    public $numero="";
    public $cvc;


    public function render()
    {
        return view('livewire.principal.pagar-suscripcion');
    }

    public function pagar(){
        $fecha_fin = date('Y-m-d', strtotime('+ '.$this->tiempo));
        $tarjeta_nombre="";

        if($this->numero[0]==4){
            $tarjeta_nombre="visa";
        }
        if($this->numero[0]==5)
        {
            $tarjeta_nombre="mastercard";
        }
        else{
            $tarjeta_nombre="desconocido";
        }
        $suscripcion=new Suscripcion();
         $suscripcion->nombre=$this->nombre;
         $suscripcion->tarjeta=$tarjeta_nombre;
         $suscripcion->precio=$this->precio;
         $suscripcion->numero_tarjeta=$this->numero;
         $suscripcion->fecha_tarjeta=$this->mes.'/'.$this->year;
         $suscripcion->ccv=$this->cvc;
         $suscripcion->fecha_inicio= date('Y-m-d');
         $suscripcion->fecha_fin=$fecha_fin;
         $suscripcion->user_id=auth()->user()->id;
        $suscripcion->save();

            $user=User::find(auth()->user()->id);
             $user->roles()->sync(3);
             $user->notify(new suscripcionNotification($suscripcion));
             $date = date('H:i:s');
             Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'Comprar Suscripcion Premiun ','descripcion'=>'El Usuario Compro La Suscripcion Premiun' ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
             return redirect()->route('anuncios.index');
    }
}
