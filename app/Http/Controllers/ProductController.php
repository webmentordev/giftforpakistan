<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create_index(){
        SEOMeta::setTitle('Create Product | GiftForPakistan');
        return view('admin.create-product', [
            'categories' => Category::all()
        ]);
    }

    public function update_index($id){
        SEOMeta::setTitle('Update Product | GiftForPakistan');
        return view('admin.update-product', [
            'categories' => Category::all(),
            'id' => $id,
            'products' => Product::find($id)
        ]);
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
            'thumb' => 'required|image|mimes:jpg,png,jpeg,webp',
            'options' => 'required',
        ]);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'thumb' => $request->thumb->store('product_images', 'public_disk'),
            'options' => $request->options,
            'slug' => str_replace(' ','-', strtolower($request->name)),
            'description' => $request->description
        ]);
        return back()->with('success', 'New Product has been created!');
    }


    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'nullable',
            'category' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'description' => 'nullable',
            'thumb' => 'nullable|image|mimes:jpg,png,jpeg,webp',
            'options' => 'nullable',
        ]);
        if($request->status == 'true'){
            $status = true;
        }elseif($request->status == 'false'){
            $status = false;
        }
        if($request->thumb != null){
            $array = array(
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category,
                'user_id' => auth()->user()->id,
                'thumb' => $request->thumb->store('product_images', 'public_disk'),
                'options' => $request->options,
                'description' => $request->description
            );
        }else{
            $array = array(
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category,
                'user_id' => auth()->user()->id,
                'options' => $request->options,
                'description' => $request->description
            );
        }
        $result = Product::find($id);
        $result->update(array_filter($array));
        $result->is_active = $status;
        $result->save();
        return back()->with('success', 'Product has been Updated!');
    }
}