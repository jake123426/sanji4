<?php

namespace App\Http\Livewire\Principal;

use Livewire\Component;
use Livewire\WithPagination;
class Categoria extends Component
{
    use WithPagination;
    public $categoria;
    public $estado;
    public $sub="todo";
    public $search;
    public $inicio=0;
    public $final=99999;
    public function render()
    {
        $subcategorias=$this->categoria->subcategoria()->get();
        if($this->inicio>0){
            $anuncios= $this->categoria->anuncio()->where('precio', '>', $this->inicio)->where('precio', '<', $this->final)->get();
        }
        else{
            $anuncios=  $this->categoria->anuncio()->where('nombre', 'like', '%' . $this->search . '%')->get();
        }

        return view('livewire.principal.categoria',compact('subcategorias','anuncios'));
    }

    public function restablecer()
    {
        $this->inicio=0;
        $this->final=99999;

    }
}
