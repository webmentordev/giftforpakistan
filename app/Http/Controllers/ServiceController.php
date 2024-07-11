<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class ServiceController extends Controller
{
    public function terms(){
        SEOMeta::setTitle('Terms Of Service | GiftForPakistan');
        SEOMeta::setDescription('Here is the list of Terms of service for GiftForPakistan. We follow the terms mentioned here.');
        SEOMeta::setCanonical('https://giftforpakistan.com/terms-of-service');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'GiftForPakistan');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Terms Of Service | GiftForPakistan');
        OpenGraph::setDescription('Here is the list of Terms of service for GiftForPakistan. We follow the terms mentioned here.'); 
        OpenGraph::setUrl('https://giftforpakistan.com/terms-of-service');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('https://giftforpakistan.com/images/cover.png');
        OpenGraph::addImage('https://giftforpakistan.com/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Terms Of Service | GiftForPakistan');
        TwitterCard::setSite('@giftforpakistan');
        TwitterCard::setImage('https://giftforpakistan.com/images/cover.png');
        TwitterCard::setDescription('Here is the list of Terms of service for GiftForPakistan. We follow the terms mentioned here.');

        JsonLd::setTitle('Terms Of Service | GiftForPakistan');
        JsonLd::setDescription('Here is the list of Terms of service for GiftForPakistan. We follow the terms mentioned here.');
        JsonLd::addImage('https://giftforpakistan.com/images/logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('https://giftforpakistan.com/images/cover.png');
        return view('terms-of-service');
    }

    public function policy(){
        SEOMeta::setTitle('Privacy Policy | GiftForPakistan');
        SEOMeta::setDescription('Here is the list of privacy policies for GiftForPakistan. We follow all the policies mentioned here.');
        SEOMeta::setCanonical('https://giftforpakistan.com/privacy-policy');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'GiftForPakistan');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Privacy Policy | GiftForPakistan');
        OpenGraph::setDescription('Here is the list of privacy policies for GiftForPakistan. We follow all the policies mentioned here.'); 
        OpenGraph::setUrl('https://giftforpakistan.com/privacy-policy');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('https://giftforpakistan.com/images/cover.png');
        OpenGraph::addImage('https://giftforpakistan.com/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Privacy Policy | GiftForPakistan');
        TwitterCard::setSite('@giftforpakistan');
        TwitterCard::setImage('https://giftforpakistan.com/images/cover.png');
        TwitterCard::setDescription('Here is the list of privacy policies for GiftForPakistan. We follow all the policies mentioned here.');

        JsonLd::setTitle('Privacy Policy | GiftForPakistan');
        JsonLd::setDescription('Here is the list of privacy policies for GiftForPakistan. We follow all the policies mentioned here.');
        JsonLd::addImage('https://giftforpakistan.com/images/logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('https://giftforpakistan.com/images/cover.png');
        return view('privacy-policy');
    }
}
