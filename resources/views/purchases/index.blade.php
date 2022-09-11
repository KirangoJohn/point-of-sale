
@extends('layout') 
@section('content')
@include('navbar')


<div class="container-fluid">
<h1>Purchases Report</h1>

<hr>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

        <div class="card card-warning">
        <div class="card-header">
        <class="card-title"><a class="btn btn-primary btn-sm float-right" href="{{url('/stocks')}}" role="button">Back to Stock</a>
</div>
<div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Item</th>
            <th>Description</th>
            <th>SKU</th>
            <th>Quantity Bought</th>
            <th>Buying_price</th>
            <th>Purchase Date</th>
        </tr>
        <tr>
        @foreach($purchases as $product)
             <td>{{ $loop->index + 1 }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->buying_price }}</td>
            <td>{{ $product->date }}</td>
            
        </tr>
        @endforeach
 
@endsection

