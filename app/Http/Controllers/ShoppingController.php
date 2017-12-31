<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

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

   public function cart(){
       
       return view('cart');
   }

   public function delete($id){
       Cart::remove($id);
       return redirect()->back();
   }
}
