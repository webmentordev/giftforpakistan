<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Auth\Events\Registered;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class SignupController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Signup | GiftForPakistan');
        SEOMeta::setDescription('Create Account In GiftForPakistan so you can track all of your purchases');
        SEOMeta::setCanonical('https://giftforpakistan.com/signup');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Signup | GiftForPakistan');
        OpenGraph::setDescription('Create Account In GiftForPakistan so you can track all of your purchases'); 
        OpenGraph::setUrl('https://giftforpakistan.com/signup');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('/images/cover.png');
        OpenGraph::addImage('/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Singup | GiftForPakistan');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('/images/cover.png');

        JsonLd::setTitle('Signup | GiftForPakistan');
        JsonLd::setDescription('Create Account In GiftForPakistan so you can track all of your purchases');
        JsonLd::addImage('/images/gift-logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('/images/cover.png');
        
        return view('auth.signup');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::attempt($request->only(['email', 'password']));

        event(new Registered($user));
        
        return redirect()->route('profile');
    }
}
