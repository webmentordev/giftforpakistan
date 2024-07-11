<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Email Vetification | GiftForPakistan');
        SEOMeta::setDescription('Verify your email now so you can access your profile.');
        SEOMeta::setCanonical('https://giftforpakistan.com/email/verify');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Email Vetification | GiftForPakistan');
        OpenGraph::setDescription('Verify your email now so you can access your profile.'); 
        OpenGraph::setUrl('https://giftforpakistan.com/email/verify');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('/images/cover.png');
        OpenGraph::addImage('/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Email Vetification | GiftForPakistan');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('/images/cover.png');

        JsonLd::setTitle('Email Vetification | GiftForPakistan');
        JsonLd::setDescription('Verify your email now so you can access your profile.');
        JsonLd::addImage('/images/gift-logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('/images/cover.png');

        return view('auth.verify-email');
    }

    public function emailVerify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('profile');
    }

    public function verify(Request $request){
        if(auth()->user()->email == null){
            $request->user()->sendEmailVerificationNotification();
        }else{
            return back()->with('error', 'Your Email is already verified!');
        }
        return back()->with('success', 'Verification link sent!');
    }
}