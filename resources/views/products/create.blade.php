@extends('layouts.app')
@section('content')



<div class = 'row'>
<div class = 'col-sm-3'>
</div>
<div class = 'col-sm-6'>
    @include('includes.error')
    <form action="{{route('products.store')}}" method = 'post' enctype = 'multipart/form-data'>
      {{csrf_field()}}
      <div class="form-group">
        <label for="email">Name:</label>
        <input type="text" class="form-control" id="email" name = 'title' value="{{ old('title') }}">
      </div>
      <div class="form-group">
        <label for="pwd">Price:</label>
        <input type="number" class="form-control" id="pwd" name = 'price' value="{{ old('price') }}">
      </div>
      <div class="form-group">
        <label for="pwd">Insert Image:</label>
        <input type="file" class="form-control" id="pwd" name = 'file_id' value="{{ old('file_id') }}">
      </div>
      <div class="form-group">
        <label for="pwd">Description:</label>
        <textarea class="form-control" id="pwd" name = 'body' value="{{ old('body') }}"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</div>

@endsection
