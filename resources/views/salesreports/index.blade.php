@extends('layout') 
@section('content')
@include('navbar')
<div class="container">
<h1>Sales Report</h1>
<hr>
<button class="btn btn-success float-right" onclick="printDivContent()" />Print</button>
</div>
<div class="row">
<div class="col-sm-4">
<form action="{{ route('salesreports.index') }}" method="GET">
<input type="text" name="search" class="form-control" placeholder="Search by name">
<button class="btn btn-primary" type="submit">Search</button> 

    <form action="{{ route('salesreports.index') }}">
  <button class="btn btn-success" type="submit">Referesh</button>
</form>
</form>
</div>
<div class="container">
        <div id="printContent">@foreach ($totals as $total)
        <h3 > TOTAL:   KSH    <strong> {{ $total->total }}</strong></h3>
        @endforeach
        @foreach ($quantity as $item)
        <h3 > QUANTITY SOLD:    <strong> {{ $item->quantity }}</strong></h3>
        @endforeach
<div>
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


<script>
function printDivContent() {
 	var divElementContents = document.getElementById("printContent").innerHTML;
 	var windows = window.open('', '', '');
 	windows.document.write('<html>');
     windows.document.write('<style> table { padding-top: 50px; margin-left: 50px; width: 70%; text-align: left; border-collapse: collapse; margin: 0 0 1em 0; caption-side: top; }</style>');
 	windows.document.write('<body> <div class="container"> <table class="table"> <h1>Sales Report<br>');
 	windows.document.write(divElementContents);
 	windows.document.write('</table></body></html>');
 	windows.document.close();
 	windows.print();
}
</script>
@endsection