<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
class BitacoraShow extends Component
{
    use WithPagination;
    public $search;
    public $bitacoras;
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.admin.bitacora-show');
    }
}
