@extends('layout')
@section('content')
@include('navbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <hr>
            
            <h2>Dashboard</h2>
            
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!--a href="{{url('/pos')}}" class="btn btn-danger btn-lg" role="button">Point of Sale</a>
                    <a href="{{url('/stocks')}}" class="btn btn-info btn-lg" role="button">Items</a>
                    <a href="#" class="btn btn-warning btn-lg" role="button">Reports</a>
                    <hr-->
                    <div class="row">
                <div class="col-sm-4">
                <div class="card bg-warning text-white">
                <div class="card-body">Total Sales
                    <br>
                </div>
                        </div>
                </div>
                <div class="col-sm-4"><div class="card bg-danger text-white">
                <div class="card-body">Total Stock</div>
                </div>
            </div>
                <div class="col-sm-4"><div class="card bg-info text-white">
            <div class="card-body">Out of Stock</div>
                </div>
            </div>
            </div>
            <hr>
           
            <div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        <a class="btn btn-danger btn-lg float-right" href="{{ route('logout') }}" role="button">Exit</a></div>
                                    </form>
            
            </div>
                </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
