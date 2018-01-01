<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use Toastr;

class ShoppingController extends Controller
{
   public function add_to_cart($id){

    $product = Product::findOrfail($id);

    Cart::add([
        'id' => $product->id,
        'name'=>$product->title,
        'qty' =>request()->qty,
        'price'=>$product->price,
    ])->associate('App\Product');
    
    return redirect('/cart');
   }

   public function displayCart(){

       
       return view('cart');
   }

   public function delete($id){
       Cart::remove($id);

       session(['success' => 'Product removed from cart']);

       return redirect()->back();
   }

   public function inc($id,$qty){

    Cart::update($id,$qty + 1);

    session(['success' => 'Quantity updated']);

    return redirect()->back();

   }
   public function dec($id,$qty){
       
    Cart::update($id,$qty - 1);

    session(['success' => 'Quantity updated']);

    return redirect()->back();
   }

   public function add_rapid($id){

    $product = Product::findOrFail($id);

       $cartItem = Cart::add([
           'id' => $product->id,
           'name'=>$product->title,
           'qty' => 1,
           'price'=> $product->price,
       ])->associate('App\Product');

       session(['success' => 'Product added to cart']);


       return redirect('/cart');
   }
}
