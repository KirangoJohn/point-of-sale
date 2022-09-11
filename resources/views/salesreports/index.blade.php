@extends('layout') 
@section('content')
@include('navbar')
<div class="container">
<h1>Sales Report</h1>
<hr>

<div class="card card-warning">
        <div class="card-header">@foreach ($totals as $total)
        <h3 class="card-title"> TOTAL:   KSH    <strong> {{ $total->total }}</strong></h3>
        @endforeach
</div>
<div class="card-body">
    <table class="table table-bordered">  
<thead>
<tr>
                    <th>Item</th>
                    <th>SKU</th>
                    <th>Selling Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date</th>
                   
</thead>
<tbody>
@foreach ($sales as $item)
<tr>
                          <td>{{ $item->product_name }}</td>
                          <td>{{ $item->sku }}</td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->quantity }}</td>
                          <td>{{ $item->subtotal }}</td>
                          <td>{{ $item->created_at }}</td>
                                                  
</tr>
@endforeach  
</table>
@endsection