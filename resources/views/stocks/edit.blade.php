@extends('layout') 
@section('content')
@include('navbar')

<div class="container">
<h1>Add Purchases</h1>

<hr>
<a class="btn btn-primary btn-sm float-right" href="{{url('/stocks')}}" role="button">View Stock</a>    
<form method="post" action="{{ route('stocks.update', $stocks->id ) }}">
@csrf
              @method('PATCH') 
    <div class="row">
            <div class="col-sm-6">
            <div class="form-group"> 
            <label for="item">Item Name:</label>
            <input type="text" class="form-control " name="products_id"  value="{{ $stocks->id }}" hidden/>
              <input type="text" class="form-control " name="name"  value="{{ $stocks->product_name }}" disabled/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
              <label for="sku">SKU:</label>
              <input type="text" class="form-control" name="sku" value="{{ $stocks->sku }}" disabled/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" value="{{ $stocks->description }}" disabled/>
          </div>
        </div>
        
        <div class="col-sm-6">
                <div class="form-group">
              <label for="exp_date">Purchase Date:</label>
              <input type="date" class="form-control" name="date" value="{{ $stocks->date }}" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="price">Buying Price:</label>
              <input type="text" class="form-control" name="buying_price" value="{{ $stocks->buying_price }}"/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="quantity">Quantity:</label>
              <input type="text" class="form-control" name="quantity" required/>
          </div>
        </div>
        
</div>
        <button type="submit" class="btn btn-primary">Update</button>

</form>
</div>
</div>
</div>

@endsection