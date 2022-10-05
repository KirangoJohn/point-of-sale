@extends('layout') 
@section('content')
@include('navbar')
<div class="container">
<h1>Sales Report</h1>
<hr>
<button class="btn btn-success float-right" onclick="printDivContent()" />Print</button>

<div class="row">
<div class="col-sm-4">
</div>
<div class="col-sm-2">

</div>
<div class="col-sm-4">
    <div class="row">
<form action="{{ route('salesreports.bydate') }}" method="GET">
<div class="col-sm-1">From:</div>
<div class="col-sm-5">
<input type="date" name="fromdate" class="form-control" placeholder="From Date">
</div>
<div class="col-sm-1">To:</div>
<div class="col-sm-5">
<input type="date" name="todate" class="form-control">
</div>
</div>
</div>
<div class="col-sm-2">

  <button class="btn btn-success" type="submit">Referesh</button>
</div>
</form>
</form>
</div>
<div class="container">
        <div id="printContent">@foreach ($total_by_date as $total)
        <p> TOTAL:   KSH    <strong> {{ $total->total }}</strong></p>
        @endforeach
        @foreach ($quantity_by_date as $item)
        <p> QUANTITY SOLD:    <strong> {{ $item->quantity }}</strong></p>
        @endforeach
        @foreach ($profit_by_date as $prt)
        <p> Total Profit:    <strong> {{ $prt->total_profit }}</strong></p>
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
                    <th>Profit</th>
                    <th>Date</th>
                   
</thead>
<tbody>
@foreach ($dates as $item)
<tr>
                          <td>{{ $item->product_name }}</td>
                          <td>{{ $item->sku }}</td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->quantity }}</td>
                          <td>{{ $item->subtotal }}</td>
                          <td>{{ $item->profit}}</td>
                          <td>{{ $item->created_at }}</td>
                                                  
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
 	windows.document.write('<body> <div class="container"><table class="table"> <h1>Sales Report</h1><br> <p> Printing Date: <?php echo date('Y-m-d');?></p> <hr>');
 	windows.document.write(divElementContents);
 	windows.document.write('</table></body></html>');
 	windows.document.close();
 	windows.print();
}
</script>
@endsection