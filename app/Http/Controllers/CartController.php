<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(Request $request, $id){
        $result = Cart::find($id);
        if($result->user_id == auth()->user()->id){
            $result->quantity = $request->quantity;
            $result->price = $result->product->price * $request->quantity;
            $result->save();
            return back();
        }
    }
}