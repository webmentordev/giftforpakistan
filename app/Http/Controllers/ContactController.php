<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class ContactController extends Controller
{

    public function index(){
        SEOMeta::setTitle('Contact Us | GiftForPakistan');
        SEOMeta::setDescription('Contact Us using the Form in case of any problem with delivery or product.');
        SEOMeta::setCanonical('https://giftforpakistan.com/contact-us');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'GiftForPakistan');
        SEOMeta::addMeta('application-name', 'GiftForPakistan');

        OpenGraph::setTitle('Contact Us | GiftForPakistan');
        OpenGraph::setDescription('Contact Us using the Form in case of any problem with delivery or product.');
        OpenGraph::setUrl('https://giftforpakistan.com/contact-us');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('https://giftforpakistan.com/images/cover.png');
        OpenGraph::addImage('https://giftforpakistan.com/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Contact Us | GiftForPakistan');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('https://giftforpakistan.com/images/cover.png');
        TwitterCard::setUrl('https://giftforpakistan.com/contact-us');

        JsonLd::setTitle('Contact Us | GiftForPakistan');
        JsonLd::setDescription('Contact Us using the Form in case of any problem with delivery or product.');
        JsonLd::addImage('https://giftforpakistan.com/images/gift-logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('https://giftforpakistan.com/images/cover.png');
        return view('contact');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required'
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject
        ]);
        return back()->with('success', 'Contact Message Sent!');
    } 
}