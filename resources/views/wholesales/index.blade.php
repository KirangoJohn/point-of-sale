@extends('layout')
@section('content')
@include('navbar')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<h1>Wholesale Products List</h1>

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
<div><a class="btn btn-primary btn-lg float-right" href="{{url('wholesales/create')}}" role="button">Add New Wholesale Products</a></div>

        @endif
        <div class="row">
          <div class="col-sm-6">
        <form action="{{ route('wholesales.index') }}" method="GET">
          <input type="text" class="form-control" placeholder="Search by name" name="search">
          </div>
          <div class="col-sm-6">
          <button class="btn btn-primary" type="submit">Search</button>
          
          <form action="{{ route('wholesales.index') }}">
          <button class="btn btn-success" type="submit">Refresh</button>
</form>
</div>
      </form>
</div>
<div class="card-body">
  <table class="table table-striped">
    <thead>

<div class="card-body">
    <table class="table table-bordered">
        <tr>
           
            <th>Item</th>
            <th>Category</th>
            <th>Description</th>
            <th>SKU</th>
            <th>Unit</th>
            <th>Manf Date</th>
            <th>Expiry Date</th>
            <th>Selling Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <tr>
        @foreach($wholesales as $wholesale)
            <td>{{ $wholesale->product_name }}</td>
            <td>{{ $wholesale->category }}</td>
            <td>{{ $wholesale->description }}</td>
            <td>{{ $wholesale->sku }}</td>
            <td>{{ $wholesale->unit }}</td>
            <td>{{ $wholesale->manuf_date }}</td>
            <td>{{ $wholesale->exp_date }}</td>
            <td>{{ $wholesale->selling_price }}</td>
            <td>{{ $wholesale->quantity }}</td>
            <td> <form action="#" method="POST">
             <a href="{{ route('wholesales.edit', $wholesale->id)}}" class="btn btn-primary">Edit</a>
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
        </tr>
        @endforeach
 
@endsection

