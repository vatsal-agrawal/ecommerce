@extends('layouts.front')
@section('book')
<div class="container">
        <div class="row pt120">
            <div class="books-grid">

            <div class="row mb30">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            
                                <div class="books-item">
                                    <div class="books-item-thumb">
                                        <img src="app/img/book6.png" alt="book">
                                        <div class="new">New</div>
                                        <div class="sale">Sale</div>
                                        <div class="overlay overlay-books"></div>
                                    </div>
            
                                    <div class="books-item-info">
                                        <a href = "{{route('product.index',[$product->id])}}">
                                        <h5 class="books-title">{{$product->title}}</h5>
                                        </a>
                                        <div class="books-price">${{$product->price}}</div>
                                    </div>
            
                                    <a href="{{route('rapid.add',[$product->id])}}" class="btn btn-small btn--dark add">
                                        <span class="text">Add to Cart</span>
                                        <i class="seoicon-commerce"></i>
                                    </a>
            
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $products->links() }}
                        <div class="row pb120">


                            </div>
                        </div>
                        </div>
                    </div>
                </div>
    
@endsection