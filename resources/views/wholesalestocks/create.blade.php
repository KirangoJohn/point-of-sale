@extends('layout') 
@section('content')
@include('navbar')

<div class="container">
<h1>Add new Products</h1>
<div></div>
<hr>
<a class="btn btn-primary btn-sm float-right" href="{{url('/items')}}" role="button">View Products</a>
<form method="post" action="{{ route('stocks.store') }}">
@csrf  
    <div class="row">
            <div class="col-sm-6">
            <div class="form-group"> 
            <label for="item">Item Name:</label>
              <input type="text" class="form-control " name="product_name" required/>
                </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group"> 
            <label for="item">Category:</label>
              <input type="text" class="form-control " name="category" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
              <label for="sku">SKU:</label>
              <input type="text" class="form-control" name="sku" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="manuf_date">Manufacture Date:</label>
              <input type="date" class="form-control" name="manuf_date"/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="exp_date">Exp Date:</label>
              <input type="date" class="form-control" name="exp_date"/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="price">Selling Price:</label>
              <input type="text" class="form-control" name="price" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="buying_price">Buying Price:</label>
              <input type="text" class="form-control" name="buying_price" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="unit">Unit:</label>
              <input type="text" class="form-control" name="unit" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="quantity">Quantity:</label>
              <input type="text" class="form-control" name="quantity" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="reorder">Reorder Level:</label>
              <input type="text" class="form-control" name="reorder" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="shop">Shop:</label>
              <select name="shop" id="" class="form-control">
                <option value="retail">Retail</option>
                <option value="wholesale">Wholesale</option>
              </select>
          </div>
        </div>
</div>
        <button type="submit" class="btn btn-primary">Add Item</button>

</form>
</div>
</div>
</div>

@endsection