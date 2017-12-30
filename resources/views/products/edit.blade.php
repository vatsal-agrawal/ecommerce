@extends('layouts.app')
@section('content')

<div class = 'row'>
<div class = 'col-sm-3'>
</div>
<div class = 'col-sm-6'>
        @include('includes.error')
    <form action="{{route('products.update',[$product->id])}}" method = 'post' enctype = 'multipart/form-data'>
      {{csrf_field()}}
      <input type = 'hidden' name = '_method' value = 'put'/>
      <div class="form-group">
        <label for="email">Name:</label>
        <input type="text" class="form-control" id="email" name = 'title' value="{{ $product->title }}">
      </div>
      <div class="form-group">
        <label for="pwd">Price:</label>
        <input type="number" class="form-control" id="pwd" name = 'price' value="{{$product->price }}">
      </div>
      <div class="form-group">
        <label for="pwd">Insert Image:</label>
        <input type="file" class="form-control" id="pwd" name = 'file_id' value="">
      </div>
      <div class="form-group">
        <label for="pwd">Description:</label>
        <textarea class="form-control" id="pwd" name = 'body'>{{$product->body}}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</div>

@endsection
