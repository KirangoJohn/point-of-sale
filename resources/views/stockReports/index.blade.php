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
<div> 
    <table class="table table-bordered">  
<thead>
<tr>
                    <th>Item</th>
                    <th>SKU</th>
                    <th style="text-align:right">Selling Price</th>
                    <th style="text-align:right">Wholesale Price</th>
                    <th style="text-align:right">Qty</th>
                    <th style="text-align:right">Retail Value</th>
                    <th style="text-align:right">Wholesale Value</th>

                   
</thead>
<tbody>
@foreach ($items as $item)
<tr>
                          <td>{{ $item->product_name }}</td>
                          <td>{{ $item->sku }}</td>
                          <td style="text-align:right">{{ $item->price }}</td>
                          <td style="text-align:right">{{ $item->wholesale_price }}</td>
                          <td style="text-align:right">{{ $item->quantity }}</td> 
                          <td style="text-align:right">{{ $item->price *$item->quantity}}</td>  
                          <td style="text-align:right">{{ $item->wholesale_price * $item->quantity }}</td>                           
</tr>
@endforeach  
</table>


<script>
function printDivContent() {
 	var divElementContents = document.getElementById("printContent").innerHTML;
 	var windows = window.open('', '', '');
 	windows.document.write('<html>');
     windows.document.write('<style>');
     windows.document.write('body { margin: 2em; color: black; font: 12pt Georgia, "Times New Roman", Times, serif;line-height: 1.3;}}');
     windows.document.write('</style>');
 	windows.document.write('<body> <div class="container"><table class="table"> <h1>Stock Report</h1><br> <p> Printing Date: <?php echo date('Y-m-d');?></p> <hr>');
 	windows.document.write(divElementContents);
 	windows.document.write('</table></body></html>');
 	windows.document.close();
 	windows.print();
}
</script>
@endsection