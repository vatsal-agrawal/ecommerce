@extends('layouts.app')
@section('content')
{{--  <div class=row>  --}}
{{--  <div class=col-md-4>  --}}
@if ($value = session('Delete'))
<div class=container>
  <p class=bg-danger >{{$value}} has been deleted</p> 
</div>
@endif
{{--  </div>  --}}
{{--  <div class=col-md-8>  --}}
        <div class="container">
                <h2>Products</h2>    
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if ($products)
                      @foreach ($products as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->price}}</td>
                            <td>
                                 <form action="{{route('products.edit',[$item->id])}}" method = 'get' enctype = 'multipart/form-data'>
                                    {{csrf_field()}}
                                    <input type = 'submit' class = 'btn btn-primary' value = 'Edit'/>
                                 </form>
                                
                            </td>
                            <td>
                                <form action="{{route('products.destroy',[$item->id])}}" method = 'post' enctype = 'multipart/form-data'>
                                    {{csrf_field()}}
                                    <input type = 'hidden' name = '_method' value = 'delete'/>
                                    <input type = 'submit' class = 'btn btn-danger' value = 'Delete'/>
                                 </form>
                            </td>
                        </tr>
                      @endforeach
                          
                      @endif
                   
                  </tbody>
                </table>
              </div>  
{{--  </div>  --}}
{{--  </div>  --}}


@endsection
