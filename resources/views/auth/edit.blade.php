@extends('layout')
@include('navbar')
@section('content')
<hr>
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">
                        <form action="{{ route('users.update', $users->id ) }}" method="POST">
                        @csrf
              @method('PATCH')
                            <div class="col-sm-12">
                                <div class="form-group">
                                <label for="cases">Name :</label>
                                <input type="text" class="form-control" name="name" value="{{ $users->name}}"/>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                <label for="cases">Email :</label>
                                <input type="text" class="form-control" name="email" value="{{ $users->email}}"/>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                <label for="cases">Phone :</label>
                                <input type="text" class="form-control" name="phone" value="{{ $users->phone}}"/>
                            </div>
                        <label for="is_permission">Select Rights:</label>
                                <select id="is_permission" name="is_permission" class="form-control">
                                    <option value="" selected disabled>Rights</option>
                                    @foreach ($rights as $key => $right)
                                        <option value="{{ $key }}"> {{ $right}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection