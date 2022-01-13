<?php

namespace App\Http\Livewire\Admin;
use Livewire\WithPagination;
use App\Models\User;
use Livewire\Component;
use App\Models\Anuncio;
use App\Models\Bitacora;

class Misanuncios extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";

    public $status=1;
    protected $listeners = ['renderizacion' => '$refresh'];
    public $tipo = "Publicandose";

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingTipo(){
        $this->resetPage();
    }

    public function render()
    {
        $user=User::find(auth()->user()->id);

        switch ($this->tipo) {
            case 'Publicandose': $anuncios = $user->anuncio()->where('status', 1)->where('nombre', 'like', '%' . $this->search . '%')->paginate(5); break;
            case 'Vendido': $anuncios = $user->anuncio()->where('status', 2)->where('nombre', 'like', '%' . $this->search . '%')->paginate(5); break;
            case 'Inactivo': $anuncios = $user->anuncio()->where('status', 0)->where('nombre', 'like', '%' . $this->search . '%')->paginate(5); break;
        }

        return view('livewire.admin.misanuncios',compact('anuncios'));
    }

    public function status_anuncio( $id , $estado){
        $anuncio=Anuncio::find($id);

        if ( $estado == 'vendido' ){
            $anuncio->status=2;
            $anuncio->save();
            date_default_timezone_set(('America/LA_Paz'));
            $date = date('h:i:s', time());
            Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>' Editar Estado Del Anuncio ','descripcion'=>'El Usuario Cambio El Estado A Vendido  Del Anuncio '. $anuncio->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        }elseif ($estado == 'inactivo'){
            $anuncio->status = 0;
            $anuncio->save();
            date_default_timezone_set(('America/LA_Paz'));
            $date = date('h:i:s', time());
            Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>' Editar Estado Del Anuncio ','descripcion'=>'El Usuario Cambio El Estado A Inactivo  Del Anuncio '. $anuncio->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        }else{
            $anuncio->status = 1; /* Publicandose */
            $anuncio->save();
            date_default_timezone_set(('America/LA_Paz'));
            $date = date('h:i:s', time());
            Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>' Editar Estado Del Anuncio ','descripcion'=>'El Usuario Cambio El Estado A Publicandose  Del Anuncio '. $anuncio->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        }

        $this->emit('renderizacion');
    }
}
