<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";

    public $name, $updateName;

    public function render()
    {
        return view('livewire.dashboard.components.categories', [
            'categories' => Category::latest()->paginate(10)
        ]);
    }
    public function create(){
        $this->validate([
            'name' => 'required'
        ]);
        Category::create([
            'name' => $this->name,
            'user_id' => auth()->user()->id
        ]);
        $this->reset();
        session()->flash('success', 'Category Successfully Created!');
    }

    public function update($id){
        $this->validate([
            'updateName' => 'required'
        ]);
        $result = Category::find($id);
        $result->name = $this->updateName;
        $result->save();
        session()->flash('update', 'Category Successfully Updated!');
    }
}