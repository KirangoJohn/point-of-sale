@extends('layouts.admin_layout.admin_layout')
@section('title', 'Add Items Data')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Items Data</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route("home") }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ route("items.index") }}">Product List</a></li>
                        <li class="breadcrumb-item active">Add Items Data</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br/>
                            @endif
                            <form method="post" action="{{ route('items.store') }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            @csrf
                                            <label for="product_name">Product Name:</label>
                                            <input type="text" class="form-control" name="product_name"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="cases">Category :</label>
                                            <input type="text" class="form-control" name="category"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sku">SKU :</label>
                                            <input type="text" class="form-control" name="sku"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Description :</label>
                                            <input type="text" class="form-control" name="description"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="manuf_date">Man Date :</label>
                                            <input type="date" class="form-control" name="manuf_date"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exp_date">Exp Date :</label>
                                            <input type="date" class="form-control" name="exp_date"/>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Item</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
