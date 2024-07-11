<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Carts extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Shopping Cart | GiftForPakistan');
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        if($cart != null){
            $price = 0;
            for($i = 0; $i < count($cart); $i++){
                $price = $price + $cart[$i]->price;
            }
            $total_price = $price;
            return view('livewire.carts', [
                'cart' => $cart,
                'total_price' => $total_price
            ]);
        }else{
            return view('livewire.carts', [
                'cart' => null,
                'total_price' => 0
            ]);
        }
    }

    public function removeItem($id){
        $result = Cart::find($id);
        if($result->user_id == auth()->user()->id){
            $result->delete();
        }else{
            abort(500, 'Internal Server Error!');
        }
    }

    public function emptyCart(){
        if(auth()->user()){
            Cart::where('user_id', auth()->user()->id)->delete();
        }else{
            abort(500, 'Internal Server Error!');
        }
    }
}