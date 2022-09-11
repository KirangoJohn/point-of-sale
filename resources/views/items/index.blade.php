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
<div><a class="btn btn-primary btn-lg float-right" href="{{url('items/create')}}" role="button">Add New Products</a></div>
<hr>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Items</h3>
</div>
<div class="card-body">
  <table class="table table-striped">
    <thead>
        <tr>
          <td>SKU</td>
          <td>Product Name</td>
          <td>Category</td>
          <td>Description</td>
          <td> Manuf Date</td>
          <td>Exp Date</td>
          <td> Buying Price</td>
          <td>Selling price</td>
          <td>Quantity</td>
          <td> Unit</td>
          <td> Reorder Level</td>
          <td colspan="2">Action</td>
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