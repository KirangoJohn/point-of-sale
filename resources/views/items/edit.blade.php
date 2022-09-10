@extends('layout') 
@section('content')
@include('navbar')

<div class="container">
<h1>Edit Products</h1>
<div><a class="btn btn-primary btn-lg float-right" href="{{url('/items')}}" role="button">Back</a></div>
<hr>
       
<form method="post" action="{{ route('items.update', $product->id ) }}">
@csrf
              @method('PATCH') 
    <div class="row">
            <div class="col-sm-6">
            <div class="form-group"> 
            <label for="item">Item Name:</label>
          
              <input type="text" class="form-control " name="name"  value="{{ $product->product_name }}" disabled/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
              <label for="sku">SKU:</label>
              <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" disabled/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" value="{{ $product->description }}" disabled/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="manuf_date">Manufacture Date:</label>
              <input type="date" class="form-control" name="manuf_date" value="{{ $product->manuf_date }}"/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="exp_date">Exp Date:</label>
              <input type="date" class="form-control" name="exp_date" value="{{ $product->exp_date }}"/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="price">Buying Price:</label>
              <input type="text" class="form-control" name="buying_price" value="{{ $product->buying_price }}"/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="unit">Unit:</label>
              <input type="text" class="form-control" name="unit" value="{{ $product->unit }}" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="quantity">Quantity:</label>
              <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}" required/>
          </div>
        </div>
</div>
        <button type="submit" class="btn btn-primary">Update</button>

</form>
</div>
</div>
</div>

@endsection