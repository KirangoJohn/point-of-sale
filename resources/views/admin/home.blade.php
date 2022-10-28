@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route("home") }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card bg-warning text-white">
                                        <div class="card-body">Total Sales
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card bg-danger text-white">
                                        <div class="card-body">Total Stock</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card bg-info text-white">
                                        <div class="card-body">Out of Stock</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
