@extends('layout') 
@section('content')
@include('navbar')

<div class="container-fluid">
<h1>Add new Stock / Restock</h1>
<div></div>
<hr>


        <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">
        <a class="btn btn-primary btn-sm float-right" href="{{url('stocks/create')}}" role="button">Add New Products</a>
        <div class="row">
          <div class="col-sm-6">
        <form action="{{ route('stocks.index') }}" method="GET">
          <input type="text" class="form-control" placeholder="Search by name" name="search">
          </div>
          <div class="col-sm-6">
          <button class="btn btn-primary" type="submit">Search</button>
          
          <form action="{{ route('stocks.index') }}">
          <button class="btn btn-success" type="submit">Refresh</button>
</form>
</div>
      </form>
</div>
</div>
<div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Item</th>
            <th>SKU</th>
            <th>Quantity</th>
            <th>Manf Date</th>
            <th>Expiry Date</th>
            <th></th>
        </tr>
        <tr>
        @if(count($products) > 0) 
        @foreach($products as $product)
             <td>{{ $loop->index + 1 }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->sku }}</td>
           
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->manuf_date }}</td>
            <td>{{ $product->exp_date }}</td>
            <td><a href="{{ route('stocks.edit', $product->id)}}" class="btn btn-primary btn-sm">Update Stock</a></td>
           
        </tr>
        @endforeach
  @else
  <p>No Items found</p>
  @endif


@endsection

