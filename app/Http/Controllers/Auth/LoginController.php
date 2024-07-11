<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class LoginController extends Controller
{
    public function __construct(){
        return $this->middleware('guest');    
    }
    
    public function index(){
        SEOMeta::setTitle('Login | GiftForPakistan');
        SEOMeta::setDescription('Login to GiftForPakistan so you can track your purchases. Send Gifts to your friends and family in Pakistan.');
        SEOMeta::setCanonical('https://giftforpakistan.com/login');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Login | GiftForPakistan');
        OpenGraph::setDescription('Login to GiftForPakistan so you can track your purchases. Send Gifts to your friends and family in Pakistan.'); 
        OpenGraph::setUrl('https://giftforpakistan.com/login');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('/images/cover.png');
        OpenGraph::addImage('/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Login | GiftForPakistan');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('/images/cover.png');

        JsonLd::setTitle('Login | GiftForPakistan');
        JsonLd::setDescription('Login to GiftForPakistan so you can track your purchases. Send Gifts to your friends and family in Pakistan.');
        JsonLd::addImage('/images/gift-logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('/images/cover.png');
        
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if(!Auth::attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('failed', 'Invalid Login Credientials');
        }
        if(auth()->user()->is_admin == true){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('profile');
        }
    }
}
