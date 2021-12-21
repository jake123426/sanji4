<?php

namespace App\Http\Livewire\Principal;

use App\Models\Anuncio;
use Livewire\Component;
use Livewire\WithPagination;
class Inicio extends Component
{

    use WithPagination;
    public $categoria=1;
    protected $listeners = ['render'];
    public $search;
    public $inicio=0;
    public $final=99999;
    public $est=1;
    public function render()
    {
        if($this->inicio>0){
            $anuncios= Anuncio::where('precio', '>', $this->inicio)->where('precio', '<', $this->final)->orderByDesc('id')->get();
        }
        else{
            $anuncios= Anuncio::where('nombre', 'like', '%' . $this->search . '%')->orderByDesc('id')->get();
        }
        return view('livewire.principal.inicio',compact('anuncios'));
    }
    public function restablecer()
    {
        $this->inicio=0;
        $this->final=99999;

    }

}
