<?php

namespace App\Http\Livewire\Dashboard;

use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Dashboard extends Component
{
    public $component = "dashboard";
    public function render()
    {
        SEOMeta::setTitle('Dashboard | GiftForPakistan');
        return view('livewire.dashboard.dashboard');
    }
    public function renderComponent($componentName){
        $this->component = $componentName;
    }
}