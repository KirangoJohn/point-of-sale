@extends('layout') 
@section('content')
@include('navbar')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Data
  </div>
  <div class="container">
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="{{ route('retailstocks.update', $retail->id ) }}">
              <div class="row">

          <div class="col-sm-6">
            <div class="form-group">
            @csrf
              @method('PATCH')
              <label for="description">Quantity :</label>
              <input type="text" class="form-control" name="quantity" value="{{ $retail->quantity }}"/>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="unit">Unit :</label>
              <input type="text" class="form-control" name="unit" value="{{ $retail->unit }}" disabled/>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="description">Reorder :</label>
              <input type="text" class="form-control" name="reorder" value="{{ $retail->reorder }}" disabled/>
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>
@endsection