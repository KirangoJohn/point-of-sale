@extends('layout')
@section('content')
@include('navbar')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<h1>Retail Stock List</h1>

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
<!--div><a class="btn btn-primary btn-lg float-right" href="{{url('retails/create')}}" role="button">Add New retail Products</a></div-->

        @endif
        <div class="row">
          <div class="col-sm-6">
        <form action="{{ route('retailstocks.index') }}" method="GET">
          <input type="text" class="form-control" placeholder="Search by name" name="search">
          </div>
          <div class="col-sm-6">
          <button class="btn btn-primary" type="submit">Search</button>
          
          <form action="{{ route('retailstocks.index') }}">
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
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <tr>
        @foreach($retails as $retail)
            <td>{{ $retail->product_name }}</td>
            <td>{{ $retail->category }}</td>
            <td>{{ $retail->description }}</td>
            <td>{{ $retail->sku }}</td>
            <td>{{ $retail->unit }}</td>
            <td>{{ $retail->quantity }}</td>
            <td> <form action="#" method="POST">
             <a href="{{ route('retailstocks.edit', $retail->id)}}" class="btn btn-primary">Add Stock</a>
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
        </tr>
        @endforeach
 
@endsection
