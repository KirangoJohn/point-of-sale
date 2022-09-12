@extends('layout') 
@section('content')
@include('navbar')
<div class="container">
<h1>Stock Report</h1>
<hr>
<button class="btn btn-success float-right" onclick="printDivContent()" />Print</button>
</div>
<div class="row">
<div class="col-sm-4">
<form action="{{ route('stockReports.index') }}" method="GET">
<input type="text" name="search" class="form-control" placeholder="Search by name">
<button class="btn btn-primary" type="submit">Search</button> 

    <form action="{{ route('stockReports.index') }}">
  <button class="btn btn-success" type="submit">Referesh</button>
</form>
</form>
</div>
<div id="printContent">
    <table class="table table-bordered">  
<thead>
<tr>
                    <th>Item</th>
                    <th>SKU</th>
                    <th>Selling Price</th>
                    <th>Wholesale Price</th>
                    <th>Quantity</th>
                    <th>Total in Retail Value</th>
                    <th>Total in Wholesale Value</th>

                   
</thead>
<tbody>
@foreach ($items as $item)
<tr>
                          <td>{{ $item->product_name }}</td>
                          <td>{{ $item->sku }}</td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->wholesale_price }}</td>
                          <td>{{ $item->quantity }}</td> 
                          <td>{{ $item->price *$item->quantity}}</td>  
                          <td>{{ $item->wholesale_price * $item->quantity }}</td>                           
</tr>
@endforeach  
</table>


<script>
function printDivContent() {
 	var divElementContents = document.getElementById("printContent").innerHTML;
 	var windows = window.open('', '', '');
 	windows.document.write('<html>');
     windows.document.write('<style> table { padding-top: 50px; margin-left: 50px; width: 70%; text-align: left; border-collapse: collapse; margin: 0 0 1em 0; caption-side: top; }</style>');
 	windows.document.write('<body> <div class="container"> <table class="table"> <h1>Stock Report<br>');
 	windows.document.write(divElementContents);
 	windows.document.write('</table></body></html>');
 	windows.document.close();
 	windows.print();
}
</script>
@endsection