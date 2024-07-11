<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\Order as MailOrder;
use App\Models\Customer;
use App\Models\Delivery;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        if(strlen($request->phone) == 12 && !is_float($request->phone)){
            if(auth()->user()){
                $cart = Cart::where('user_id', auth()->user()->id)->with('product')->get();
                if(count($cart) > 0){
                    $items = Cart::where('user_id', auth()->user()->id)->get();
                    $order_number = rand(300, 900004455);
                    foreach($items as $item){
                        Order::create([
                            'product_id' => $item->product_id,
                            'order_number' => $order_number,
                            'product_name' => $item->product->name,
                            'user_id' => auth()->user()->id,
                            'quantity' => $item->quantity,
                            'price' => $item->price,
                        ]);
                        $item->delete();
                    }
                    Customer::create([
                        "order_number" => $order_number,
                        "name" => $request->name,
                        "phone_number" => $request->phone,
                        "address" => $request->address,
                        'user_id' => auth()->user()->id
                    ]);
                    Delivery::create([
                        "order_number" => $order_number,
                        "status" => 'pending',
                        "line" => 'Your order is being processed. Check later for further details',
                        "email" => auth()->user()->email
                    ]);
                    $orders = Order::where('order_number', $order_number)->with(['customer', 'user'])->get();
                    Mail::to(auth()->user()->email)->send(new MailOrder($orders));
                    return back()->with('success', 'Order successfully placed! Confirmation email has been sent. Must check spam section. Thank You!');
                }else{
                    return back()->with('failed', 'Your Cart is empty!');
                }
            }else{
                return redirect()->route('login');
            }
        }else{
            return back()->with('failed', 'Mobile Number Must be start from 92 and should have 12 digits!');
        }
    } 
}