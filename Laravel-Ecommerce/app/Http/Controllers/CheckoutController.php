<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Cart;
use Stripe\Charge;
use Stripe\Stripe;
use Session;
use Mail;
class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }
    public function pay()
    {
       // dd(request()->all());
       Stripe::setApiKey("sk_test_51IC81ALTUEuPSFyGPZJUg3HeVgJKpmJpbZQwi9wb07JI0xSuEI2hzYFU9qxZHs54TLgendHZ9gabgqPc5DYqCTpl00qyLGki4i");

       $charge = Charge::create([
           'amount' => Cart::total() * 100,
           'currency' => 'usd',
           'description' => 'Laravel Ecommerce',
           'source' => request()->stripeToken
       ]);

       Session::flash('success', 'Purchase successfull. wait for our email.');

       Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

       return redirect('/');
    }
}
