@extends('layout') 
@section('content')
@include('navbar')

<div class="container">
<h1>Edit Products</h1>
<div><a class="btn btn-primary btn-lg float-right" href="{{url('/items')}}" role="button">Back</a></div>
<hr>
       
<form method="post" action="{{ route('items.update', $product->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="product_name">Product Name:</label>
              <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}"/>
          </div>
          <div class="form-group">
              <label for="price">Selling Price :</label>
              <input type="text" class="form-control" name="price" value="{{ $product->price }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
</div>
</div>
</div>

@endsection