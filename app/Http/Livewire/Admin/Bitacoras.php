<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class Bitacoras extends Component
{
    use WithPagination;
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $usuarios = User::where('name', 'like', '%' . $this->search . '%')
        ->Where('status', '=', 1)
        ->paginate(10);
        return view('livewire.admin.bitacoras', compact('usuarios'));
    }
}
