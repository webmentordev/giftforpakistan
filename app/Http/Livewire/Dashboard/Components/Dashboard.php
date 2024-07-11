<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.components.dashboard', [
            'users' => count(User::all()),
            'categories' => count(Category::all()),
            'contacts' => count(Contact::all()),
            'products' => count(Product::all()),
            'worth_order' => Order::sum('price'),
            'orders' => Order::all()->count()
        ]);
    }
}
