<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Order Tracking | GiftForPakistan');
        return view("order-tracking", [
            "status" => null
        ]);
    }

    public function store(Request $request){
        SEOMeta::setTitle('Order Tracking | GiftForPakistan');
        $this->validate($request, [
            'email' => 'required|email',
            'order' => 'required|numeric'
        ]);
        $data = Delivery::where('email', $request->email)->where('order_number', $request->order)->latest()->get();
        return view("order-tracking", [
            "status" => $data
        ]);
    }
}