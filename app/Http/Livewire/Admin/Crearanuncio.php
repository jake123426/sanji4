<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\subcategorias;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Livewire\Component;

class Crearanuncio extends Component
{

    public $sub=1;



    public function render()
    {

      $categorias=Categoria::all();
      $cat=Categoria::find($this->sub);

      $subcategorias=$cat->subcategoria()->get();



        return view('livewire.admin.crearanuncio',compact('categorias','subcategorias'));
    }



}
