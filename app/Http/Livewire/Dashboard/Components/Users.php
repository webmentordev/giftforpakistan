<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";

    public function render()
    {
        return view('livewire.dashboard.components.users', [
            'users' => User::latest()->paginate(50)
        ]);
    }
}
