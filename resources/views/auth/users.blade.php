@extends('layout')
@section('content')
@include('navbar')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<h1>Users List</h1>

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
        <a class="btn btn-primary btn-sm float-right" href="{{url('/registration')}}" role="button">Add New Users</a>
        @endif
        <table class="table table-striped">
    <thead>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Phone</th>
          <th>Role</th>
          <th colspan="2">Action</th>
</tr>
</thead>
    <tbody><tr>
        @foreach($users as $user)
        
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->rights}}</td>
            <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
@endsection