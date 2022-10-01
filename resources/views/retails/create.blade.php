@extends('layout') 
@section('content')
@include('navbar')
<div class="container">
<h2>Add retail Data</h2>
<hr>
    <div class="col-sm-8">
<div class="card uper">
  <div class="card-header">
    
    
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
    <form method="post" action="{{ route('retails.store') }}">
          <div class="form-group">
              @csrf
              <label for="products_id">Select an Item:</label>
                    <select id="products_id" name="products_id" class="form-control">
                        <option value="" selected disabled>Select an Item</option>
                        @foreach ($products as $key => $product)
                            <option value="{{ $key }}"> {{ $product}}</option>
                        @endforeach
                    </select>
          </div>
          <div class="form-group">
              <label for="buying_price">Buying Price :</label>
              <input type="text" class="form-control" name="buying_price"/>
          </div>
          <div class="form-group">
              <label for="selling_price">selling Price :</label>
              <input type="text" class="form-control" name="selling_price"/>
          </div>
          <div class="form-group">
              <label for="quantity">Quantity :</label>
              <input type="text" class="form-control" name="quantity"/>
          </div>
          <div class="form-group">
              <label for="unit">unit :</label>
              <input type="text" class="form-control" name="unit"/>
          </div>
          <div class="form-group">
              <label for="reorder">Reorder Level :</label>
              <input type="text" class="form-control" name="reorder"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Item</button>
      </form>
  </div>
</div>
@endsection