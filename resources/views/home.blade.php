@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{url('/pos')}}" class="btn btn-danger btn-lg" role="button">Point of Sale</a>
                    <a href="{{url('/stocks')}}" class="btn btn-info btn-lg" role="button">Products</a>
                    <a href="#" class="btn btn-warning btn-lg" role="button">Reports</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
