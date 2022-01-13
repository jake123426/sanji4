<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\reporte;
use Livewire\Component;
use Livewire\WithPagination;
class UserAlert extends Component
{
    use WithPagination;
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $usuarios = reporte::where('nombre_reportado', 'like', '%' . $this->search . '%')
        ->paginate(10);
        return view('livewire.admin.user-alert', compact('usuarios'));
    }
}
