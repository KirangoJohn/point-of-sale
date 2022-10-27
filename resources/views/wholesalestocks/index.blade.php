@extends('layout')
@section('content')
@include('navbar')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<h1>Wholesale Stock List</h1>

<hr>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="card card-warning">
        <div class="card-header">
        <class="card-title">
        @if(checkPermission(['admin','superadmin']))
<!--div><a class="btn btn-primary btn-lg float-right" href="{{url('wholesales/create')}}" role="button">Add New Wholesale Products</a></div-->

        @endif
        <div class="row">
          <div class="col-sm-6">
        <form action="{{ route('wholesalestocks.index') }}" method="GET">
          <input type="text" class="form-control" placeholder="Search by name" name="search">
          </div>
          <div class="col-sm-6">
          <button class="btn btn-primary" type="submit">Search</button>
          
          <form action="{{ route('wholesalestocks.index') }}">
          <button class="btn btn-success" type="submit">Refresh</button>
</form>
</div>
      </form>
</div>
<div class="card-body">
<div class="col">
<button class="btn btn-success float-right" onclick="printDivContent()" />Print</button>
<div class="container" id="printContent">

<div class="card-body">
    <table class="table table-bordered">
        <tr>
           
            <th>Item</th>
            <th>Category</th>
            <th>Description</th>
            <th>SKU</th>
            <th>Unit</th>
            <th>Quantity</th>
            @if(checkPermission(['superadmin']))
            <th>Action</th>
            @endif
        </tr>
        <tr>
        @foreach($wholesales as $wholesale)
            <td>{{ $wholesale->product_name }}</td>
            <td>{{ $wholesale->category }}</td>
            <td>{{ $wholesale->description }}</td>
            <td>{{ $wholesale->sku }}</td>
            <td>{{ $wholesale->unit }}</td>
            <td>{{ $wholesale->quantity }}</td>
            @if(checkPermission(['superadmin']))
            <td> <form action="#" method="POST">
             <a href="{{ route('wholesalestocks.edit', $wholesale->id)}}" class="btn btn-primary">Add Stock</a>
            </form></td>@endif
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
 	windows.document.write('<body> <div class="container"><table class="table"> <h1>Wholesale Stock</h1><br> <p> Printing Date: <?php echo date('Y-m-d');?></p> <hr>');
 	windows.document.write(divElementContents);
 	windows.document.write('</table></body></html>');
 	windows.document.close();
 	windows.print();
}
</script>
 
@endsection

