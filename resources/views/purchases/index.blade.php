
@extends('layout') 
@section('content')
@include('navbar')

<div class="container">
<h1>Purchases Report</h1>
<hr>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

        <div>
        <div>
        <a class="btn btn-primary btn-sm float-right" href="{{url('/stocks')}}" role="button">Back to Stock</a>
        <div class="row">
        <div class="col-sm-4">
        <form action="{{ route('purchases.index') }}" method="GET">
    <!--input type="text" name="search" placeholder="Search" class="form-control"-->
    <input type="date" name="search" class="form-control" placeholder="yyyy-mm-dd" value="" min="1997-01-01" max="2030-12-31">
        </div>
        <div class="col-sm-4">
        <button class="btn btn-primary" type="submit">Search</button> 
        <form action="{{ route('purchases.index') }}">
            <button class="btn btn-success" type="submit">Referesh</button>
</form>
</div>
<div class="col-sm-4">
        <button class="btn btn-success float-left" onclick="printDivContent()" />Print</button>
</div>
</div>
</div>
<div id="printContent">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Item</th>
            <th>Description</th>
            <th>SKU</th>
            <th style="text-align:right">Qty Bought</th>
            <th style="text-align:right">Buying_price</th>
            <th style="text-align:right">Purchase Date</th>
        </tr>
        <tr>
        @foreach($purchases as $product)
             <td>{{ $loop->index + 1 }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->sku }}</td>
            <td style="text-align:right">{{ $product->quantity }}</td>
            <td style="text-align:right">{{ $product->buying_price }}</td>
            <td style="text-align:right">{{ $product->date }}</td>
            
        </tr>
        @endforeach

        <script>
function printDivContent() {
 	var divElementContents = document.getElementById("printContent").innerHTML;
 	var windows = window.open('', '', '');
 	windows.document.write('<html>');
     windows.document.write('<style>');
     windows.document.write('body { margin: 2em; color: black; font: 12pt Georgia, "Times New Roman", Times, serif;line-height: 1.3;}}');
     windows.document.write('</style>');
 	windows.document.write('<body> <div class="container"><table class="table"> <h1>Purchases Report</h1><br> <p> Printing Date: <?php echo date('Y-m-d');?></p> <hr>');
 	windows.document.write(divElementContents);
 	windows.document.write('</table></body></html>');
 	windows.document.close();
 	windows.print();
}
</script>
 
@endsection

