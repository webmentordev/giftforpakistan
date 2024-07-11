<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;

class ProfileController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Profile | GiftForPakistan');
        return view('profile.profile');
    }

    public function orders(){
        SEOMeta::setTitle('Orders | GiftForPakistan');
        return view('profile.orders', [
            'orders' => Order::where('user_id', auth()->user()->id)->paginate(10),
            'count_order' => Order::where('user_id', auth()->user()->id)->distinct()->get()->count(),
        ]);
    }

    public function setting(){
        SEOMeta::setTitle('Settings | GiftForPakistan');
        return view('profile.settings');
    }

    public function logs(){
        SEOMeta::setTitle('Activity Logs | GiftForPakistan');
        return view('profile.logs', [
            'logs' => DB::table('authentication_log')->where('authenticatable_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(10)
        ]);
    }

    public function settingUpdate(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required'
        ]);
        $result = User::find(auth()->user()->id);
        $result->name = $request->name;
        $result->address = $request->address;
        $result->save();
        return back()->with('success', 'Account Details successfully updated!');
    }
}