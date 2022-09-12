@extends('layout')
@section('content')
@include('navbar')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<h1>Products List</h1>

<hr>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="card card-warning">
        <div class="card-header">
        <class="card-title">
        <a class="btn btn-primary btn-sm float-right" href="{{url('items/create')}}" role="button">Add New Products</a>
        <div class="row">
          <div class="col-sm-6">
        <form action="{{ route('items.index') }}" method="GET">
          <input type="text" class="form-control" placeholder="Search by name" name="search">
          </div>
          <div class="col-sm-6">
          <button class="btn btn-primary" type="submit">Search</button>
          
          <form action="{{ route('items.index') }}">
          <button class="btn btn-success" type="submit">Refresh</button>
</form>
</div>
      </form>
</div>
<div class="card-body">
  <table class="table table-striped">
    <thead>
        <tr>
          <th>SKU</th>
          <th>Product Name</th>
          <th>Category</th>
          <th>Description</th>
          <th> Manuf Date</th>
          <th>Exp Date</th>
          <th> Buying Price</th>
          <th>Selling price</th>
          <th>Wholesale price</th>
          <th>Quantity</th>
          <th> Unit</th>
          <th> Reorder Level</th>
          <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $test)
        <tr>
            <td>{{$test->sku}}</td>
            <td>{{$test->product_name}}</td>
            <td>{{$test->category}}</td>
            <td>{{$test->description}}</td>
            <td>{{$test->manuf_date}}</td>
            <td>{{$test->exp_date}}</td>
            <td>{{$test->buying_price}}</td>
            <td>{{$test->price}}</td>
            <td>{{$test->wholesale_price}}</td>
            <td>{{$test->quantity}}</td>
            <td>{{$test->unit}}</td>
            <td>{{$test->reorder}}</td>
            <td><a href="{{ route('items.edit', $test->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('items.destroy', $test->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection