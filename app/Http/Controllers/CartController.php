<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CartController
{
    //add new product


//add to cart
public function addToCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'userId' => 'required|integer|min:1'
    ]);

    $product = Product::findOrFail($request->product_id);

    if ($product->stock < $request->quantity) {
       
        return redirect()->route('show.product')->with('status', 'out of stock!');
    }

    $cartItem = Cart::where('user_id', Auth::id())
        ->where('product_id', $product->id)
        ->first();

    if ($cartItem) {
        // Update existing cart item quantity
        $cartItem->update([
            'quantity' => DB::raw('quantity + ' . $request->quantity)
        ]);
    } else {
        // Add new item to cart
        $cartItem = Cart::create([
            'user_id' => $request->userId,
            'product_id' => $product->id,
            'quantity' => $request->quantity
        ]);
    }

     return redirect()->back()->with('status', 'Product added to cart successfully!');
}


//checkouts
public function checkout()
{
    $user = Auth::user();

    if (!$user) {
        return response()->json(['message' => 'You must be logged in to checkout'], 403);
    }

    $cartItems = Cart::where('user_id', $user->id)->get();

    if ($cartItems->isEmpty()) {
        return response()->json(['message' => 'Your cart is empty'], 400);
    }

    $totalAmount = $cartItems->sum(function ($cartItem) {
        return $cartItem->quantity * $cartItem->product->price;
    });

    $order = Order::create([
        'user_id' => $user->id,
        'total_amount' => $totalAmount,
        'status' => 'pending'
    ]);

    foreach ($cartItems as $cartItem) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->product->price,
        ]);

        // Decrease stock of the product
        $cartItem->product->decrement('stock', $cartItem->quantity);
    }

    // Clear the cart after checkout
    Cart::where('user_id', $user->id)->delete();

    return response()->json(['message' => 'Checkout successful', 'order' => $order]);
    //return redirect()->route('show.product')->with('success', 'Product added to cart successfully!');
}


public function remove($id)
{
    Cart::findOrFail($id)->delete();
    return redirect()->back()->with('status', 'Item removed from cart.');
}

public function empty()
{
    $userId =Auth::id();
    Cart::where('user_id', $userId)->delete();
    return redirect()->back()->with('status', 'Cart emptied.');
}


}
