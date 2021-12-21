<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $usuarios = User::where('name', 'like', '%' . $this->search . '%')
                        ->Where('status', '=', 1)
                        ->paginate(10);

        return view('livewire.admin.usuarios', compact('usuarios'));
    }
}
