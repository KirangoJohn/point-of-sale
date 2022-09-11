@extends('layout') 
@section('content')
@include('navbar')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="{{ route('items.update', $products->id ) }}">
  
          <div class="form-group">
              @csrf
              @method('PATCH')
              <div class="row">
            <div class="col-sm-6">
            <div class="form-group"> 
             
              <label for="product_name">Product Name:</label>
              <input type="text" class="form-control" name="product_name" value="{{ $products->product_name }}"/>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="cases">Category :</label>
              <input type="text" class="form-control" name="category" value="{{ $products->category }}"/>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="sku">SKU :</label>
              <input type="text" class="form-control" name="sku" value="{{ $products->sku }}"/>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description" value="{{ $products->description }}"/>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
              <label for="manuf_date">Man Date :</label>
              <input type="date" class="form-control" name="manuf_date" value="{{ $products->manuf_date }}"/>
          </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
              <label for="exp_date">Exp Date :</label>
              <input type="date" class="form-control" name="exp_date" value="{{ $products->exp_date }}"/>
          </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
              <label for="buying_price">Buying Price :</label>
              <input type="text" class="form-control" name="buying_price" value="{{ $products->buying_price }}"/>
          </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
              <label for="price">Selling Price :</label>
              <input type="text" class="form-control" name="price" value="{{ $products->price }}"/>
          </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
              <label for="quantity">Quantity :</label>
              <input type="text" class="form-control" name="quantity" value="{{ $products->quantity }}"/>
          </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
              <label for="unit">Unit :</label>
              <input type="text" class="form-control" name="unit" value="{{ $products->unit }}"/>
          </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
              <label for="reorder">Reorder :</label>
              <input type="text" class="form-control" name="reorder" value="{{ $products->reorder }}"/>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
@endsection