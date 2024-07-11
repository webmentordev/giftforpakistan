<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";
    
    public function render()
    {
        return view('livewire.dashboard.components.contacts', [
            'contacts' => Contact::latest()->paginate(20)
        ]);
    }
}