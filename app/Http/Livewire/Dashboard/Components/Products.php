<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    
    public function render()
    {
        return view('livewire.dashboard.components.products', [
            'products' => Product::latest()->paginate(20)
        ]);
    }
}
