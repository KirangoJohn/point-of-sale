@extends('layout') 
@section('content')
@include('navbar')
<div class="container">
<h1>Products Expiry Report</h1>
<hr>
<button class="btn btn-success float-right" onclick="printDivContent()" />Print</button>
</div>
<div class="row">
<div class="col-sm-4">
<form action="{{ route('expReports.index') }}" method="GET">
<input type="text" name="search" class="form-control" placeholder="Search by name">
<button class="btn btn-primary" type="submit">Search</button> 

    <form action="{{ route('expReports.index') }}">
  <button class="btn btn-success" type="submit">Referesh</button>
</form>
</form>
</div>
<div id="printContent">
    <table class="table table-bordered">  
<thead>
<tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Manf Date</th>
                    <th>Exp Date</th>
                   
                   
</thead>
<tbody>
@foreach ($items as $item)
<tr>
                          <td>{{ $item->product_name }}</td>
                          <td>{{ $item->description }}</td>
                          <td>{{ $item->manuf_date }}</td>
                          <td>{{ $item->exp_date }}</td> 
                                                  
</tr>
@endforeach  
</table>


<script>
function printDivContent() {
 	var divElementContents = document.getElementById("printContent").innerHTML;
 	var windows = window.open('', '', '');
 	windows.document.write('<html>');
     windows.document.write('<style> table { padding-top: 50px; margin-left: 50px; width: 70%; text-align: left; border-collapse: collapse; margin: 0 0 1em 0; caption-side: top; }</style>');
 	windows.document.write('<body> <div class="container"> <table class="table"> <h1>Products Expiry Report<br>');
 	windows.document.write(divElementContents);
 	windows.document.write('</table></body></html>');
 	windows.document.close();
 	windows.print();
}
</script>
@endsection