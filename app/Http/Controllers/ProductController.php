<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController
{

public function create()
{
    return view('admin.addnewproduct');
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $imageUrl = Storage::url($imagePath);
    }

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'image' => $imageUrl,
        'slug' => Str::slug($request->name, '-'),
    ]);

    return redirect()->route('products.create')->with('success', 'Product added successfully!');
}
    

public function showProducts()
{
    $products = Product::all();
    $userId =Auth::id();
    $cartItems = Cart::where('user_id', $userId)->get();
    $distinctItemCount = $cartItems->count();

    // Pass products to the view
    return view('home2.index', ['products' => $products, 'distinctItemCount'=>$distinctItemCount]);
}

public function showCheckout()
{
    $userId =Auth::id();
    $cartItems = Cart::with('product')->where('user_id', $userId)->get();
    $distinctItemCount = $cartItems->count();
    return view('home2.cart', ['cartItems' => $cartItems, 'distinctItemCount'=>$distinctItemCount]);
}
public function ProductDetails($id)
{
    
    $Productprofile = Product::find($id);
    return view('home2.cartprofile', ['Productprofile' => $Productprofile]);
}


}
