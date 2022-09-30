@extends('layout') 
@section('content')
@include('navbar')
<div class="container">
<hr>
    <div class="col-sm-8">
<div class="card uper">
  <div class="card-header">
    
    Add Items Data
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
      <form method="post" action="{{ route('items.store') }}">
      <div class="row">
            <div class="col-sm-6">
            <div class="form-group"> 
              @csrf
              <label for="product_name">Product Name:</label>
              <input type="text" class="form-control" name="product_name"/>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="cases">Category :</label>
              <input type="text" class="form-control" name="category"/>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="sku">SKU :</label>
              <input type="text" class="form-control" name="sku"/>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
              <label for="manuf_date">Man Date :</label>
              <input type="date" class="form-control" name="manuf_date"/>
          </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
              <label for="exp_date">Exp Date :</label>
              <input type="date" class="form-control" name="exp_date"/>
          </div>
</div>

          <button type="submit" class="btn btn-primary">Add Item</button>
      </form>
  </div>
</div>
</div>
</div>
@endsection