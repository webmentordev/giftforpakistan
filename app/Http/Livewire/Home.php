<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $categories, $products, $search;

    public function render()
    {
        SEOMeta::setTitle('GiftForPakistan | Send Gifts In Pakistan');
        SEOMeta::setDescription('Send gifts to your family and friends allover pakistan. We provide secure and fast gift delievery service.');
        SEOMeta::setCanonical('https://giftforpakistan.com');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('GiftForPakistan | Send Gifts In Pakistan');
        OpenGraph::setDescription('Send gifts to your family and friends allover pakistan. We provide secure and fast gift delievery service.'); 
        OpenGraph::setUrl('https://giftforpakistan.com');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('https://giftforpakistan.com/images/cover.png');

        TwitterCard::setTitle('GiftForPakistan | Send Gifts In Pakistan');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('https://giftforpakistan.com/images/cover.png');

        JsonLd::setTitle('GiftForPakistan | Send Gifts In Pakistan');
        JsonLd::setDescription('Send gifts to your family and friends allover pakistan. We provide secure and fast gift delievery service.');
        JsonLd::addImage('https://giftforpakistan.com/images/gift-logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('https://giftforpakistan.com/images/cover.png');
        
        return view('livewire.home');
    }

    public function mount(){
        $this->categories = Category::latest()->get();
        $this->products = Product::where('is_active', true)->with(['user', 'category'])->latest()->get();
        $this->latest = Product::where('is_active', true)->latest()->limit(4)->get();
    }

    public function updated(){
        if($this->search != null){
            $this->products = Product::where('name', "LIKE", '%'.$this->search.'%')->orwhere('description', "LIKE", '%'.$this->search.'%')->latest()->get();
        }else{
            $this->products =  Product::where('is_active', true)->latest()->get();
        }
    }

    public function byCategory($id){
        $this->products = Product::where('category_id', $id)->with(['user', 'category'])->latest()->get();
    }

    public function addToCart($id){
        if(auth()->user() != null){
            $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $id)->get();
            if(count($cart) > 0){
                $result = Product::find($id);
                $cart[0]->quantity = $cart[0]->quantity + 1; 
                $cart[0]->price = $result->price * $cart[0]->quantity;
                $cart[0]->save();
                session()->flash('success', 'Product Quantity Added!');
            }else{
                $result = Product::find($id);
                $quantity = 1;
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $id,
                    'quantity' => $quantity,
                    'price' => $result->price * $quantity
                ]);
                session()->flash('success', "Product Added to The Cart!");
            }
        }else{
            return redirect()->route('login');
        }
    }
}