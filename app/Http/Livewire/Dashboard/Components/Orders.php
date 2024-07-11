<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Delivery;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $status, $fetched = null;

    public function render()
    {
        return view('livewire.dashboard.components.orders', [
            'orders' => Order::latest()->with(['user', 'customer', 'delivery', 'product'])->paginate(20)
        ]);
    }

    public function updateStatus($order){
        $result = Order::where('order_number', $order)->get();
        if($result[0]->status != 'delivered'){
            foreach($result as $item){
                $item->status = $this->status;
                $item->save();
            }
            if($this->status == "pending"){
                $line = 'Your order is being processed. Check later for further details';
            }elseif($this->status == "shipping"){
                $line = 'Your order is being delivered. It will take 12 or less business hours to deliver.';
            }elseif($this->status == "delivered"){
                $line = 'Your order has been delivered. Thank you for choosing GiftForPakistan 🙂';
            }
            Delivery::create([
                "order_number" => $order,
                "status" => $this->status,
                "line" => $line,
                "email" => $result[0]->user->email
            ]);
            return back()->with('success', "Status Updated to {$this->status}");
        }else{
            return back()->with('failed', "You have already completed the delivery!");
        }
    }
    public function calculate($order){
        $this->fetched = Order::where('order_number', $order)->get();
    }
}