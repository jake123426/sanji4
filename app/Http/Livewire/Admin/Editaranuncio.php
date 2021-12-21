<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Subcategoria;
class Editaranuncio extends Component
{
    public $anuncio;
    public $sub=1;
    public function render()
    {
        $categorias=Categoria::all();
        $cat=Categoria::find($this->sub);

        $subcategorias=$cat->subcategoria()->get();
        return view('livewire.admin.editaranuncio',compact('categorias','subcategorias'));
    }
}
