<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Photo;

class ProductsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $products = Product::all();
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if($request->file('file_id')){
            $file = $request->file('file_id');
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
        }
            $product = new Product();
            $product->title = $request->title;
            $product->price = $request->price;
            $product->body = $request->body;
            $product->file_id = $photo->id;
            $product->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        if($request->file('file_id')){
            $file = $request->file('file_id');
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);//update string instead of creating new row
        }
        $product->title = $request->title;
            $product->price = $request->price;
            $product->body = $request->body;
            $product->file_id = $photo->id;
            $product->save();
         return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        unlink(public_path() .'/images/'.$product->file->file);
        session(['Delete'=>$product->title]);
        $product->delete();
       return redirect()->back();
    }
}
