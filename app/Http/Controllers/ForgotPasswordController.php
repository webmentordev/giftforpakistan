<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Artesaos\SEOTools\Facades\TwitterCard;

class ForgotPasswordController extends Controller
{
    public function index() {
        SEOMeta::setTitle('Forgot Password | GiftForPakistan');
        SEOMeta::setDescription('Have you forgot your password? Send Email using the field below.');
        SEOMeta::setCanonical('https://giftforpakistan.com/forgot-password');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Forgot Password | GiftForPakistan');
        OpenGraph::setDescription('Have you forgot your password? Send Email using the field below.'); 
        OpenGraph::setUrl('https://giftforpakistan.com/forgot-password');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('/images/cover.png');
        OpenGraph::addImage('/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Forgot Password | GiftForPakistan');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('/images/cover.png');

        JsonLd::setTitle('Forgot Password | GiftForPakistan');
        JsonLd::setDescription('Have you forgot your password? Send Email using the field below.');
        JsonLd::addImage('/images/gift-logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('/images/cover.png');
        return view('auth.forgot-password');
    }

    public function store(Request $request) {
        $request->validate(['email' => 'required|email']);
     
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['success' => __($status)])
                    : back()->withErrors(['failed' => __($status)]);
    }

    public function emailVerify($token){
        SEOMeta::setTitle('Reset Password | GiftForPakistan');
        SEOMeta::setDescription('Have you forgot your password? Send Email using the field below.');
        SEOMeta::setCanonical('https://giftforpakistan.com/reset-password');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Reset Password | GiftForPakistan');
        OpenGraph::setDescription('Have you forgot your password? Send Email using the field below.'); 
        OpenGraph::setUrl('https://giftforpakistan.com/reset-password');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('/images/cover.png');
        OpenGraph::addImage('/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Reset Password | GiftForPakistan');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('/images/cover.png');

        JsonLd::setTitle('Reset Password | GiftForPakistan');
        JsonLd::setDescription('Have you forgot your password? Send Email using the field below.');
        JsonLd::addImage('/images/gift-logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('/images/cover.png');
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', __($status))
                    : back()->withErrors(['failed' => [__($status)]]);
    }
}