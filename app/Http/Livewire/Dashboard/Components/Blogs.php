<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.dashboard.components.blogs', [
            'blogs' => Blog::latest()->paginate(20)
        ]);
    }
}