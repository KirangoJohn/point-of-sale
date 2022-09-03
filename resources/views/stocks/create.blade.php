@extends('layout') 
@section('content')

<div class="container">
<h1>Add new Items</h1>
<div><a class="btn btn-primary btn-lg float-right" href="{{url('/stocks')}}" role="button">View Stock</a></div>
<hr>
       
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
              <label for="price">Price:</label>
              <input type="text" class="form-control" name="price" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="quantity">Quantity:</label>
              <input type="text" class="form-control" name="quantity" required/>
          </div>
        </div>
</div>
        <button type="submit" class="btn btn-primary">Add Item</button>

</form>
</div>
</div>
</div>

@endsection