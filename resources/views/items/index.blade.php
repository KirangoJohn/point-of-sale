
@extends('layout') 
@section('content')
@include('navbar')

<div class="container-fluid">
<h1>Products List</h1>
<div><a class="btn btn-primary btn-lg float-right" href="{{url('stocks/create')}}" role="button">Add New Products</a></div>
<hr>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

        <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Items</h3>
</div>
<div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Item</th>
            <th>Category</th>
            <th>Description</th>
            <th>SKU</th>
            <th>Unit</th>
            <th>Manf Date</th>
            <th>Expiry Date</th>
            <th></th>
        </tr>
        <tr>
        @foreach($products as $product)
             <td>{{ $loop->index + 1 }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->manuf_date }}</td>
            <td>{{ $product->exp_date }}</td>
            <td> <form action="#" method="POST">
             <a class="btn btn-primary" href="{{ route('items.edit',$product->id)}}">Edit</a>
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
            <td>
                                </td>
        </tr>
        @endforeach
 
@endsection

