<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Cart;
use Mail;
use App\Mail\SuccessEmail;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function checkout(){
        

        //use Stripe::setApiKey('--key--');

        $customer = Customer::create(array(
            'email' => request()->stripeEmail,
            'source'  => request()->stripeToken
        ));

        $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount'   => Cart::total() * 100 ,
            'currency' => 'usd'
        ));
        Mail::to(request()->stripeEmail)->send(new SuccessEmail);

        Cart::destroy();

        session(['success' => 'Transaction is Successful Enjoy']);

        return redirect('/');
    }
}
