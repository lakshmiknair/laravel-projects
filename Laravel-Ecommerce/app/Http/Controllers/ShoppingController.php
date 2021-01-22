<?php

namespace App\Http\Controllers;
use Cart;
use App\Product;
use Session;

use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    
    public function add_to_cart()
    {
        $pdt = Product::find(request()->product_id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);

      
        Cart::associate($cartItem->rowId, 'App\Product');
        Session::flash('success_message', 'Product added to cart.');

        return redirect()->route('cart');
    }
    public function cart()
    {
       // Cart::destroy();
     //  dd(Cart::content());
        return view('cart');
    }
    public function cart_delete($id)
    {
        Cart::remove($id); 
         Session::flash('success_message', 'Product removed from cart.');

        return redirect()->route('cart');
    }
    public function incr($id,$qty)
    {
     
        Cart::update($id,$qty +1); 
         Session::flash('success_message', 'Product updated.');

         return redirect()->route('cart');
    }
    public function decr($id,$qty)
    {
        Cart::update($id,$qty - 1); 
         Session::flash('success_message', 'Product removed from cart.');

        return redirect()->route('cart');
    }
    public function rapid_add($id)
    {
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price
        ]);

      
        Cart::associate($cartItem->rowId, 'App\Product');
        Session::flash('success_message', 'Product added to cart.');

        return redirect()->route('cart');
    }
}
