@extends('layouts.admin_layout.admin_layout')
@section('title', 'Add Retail Data')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Retail Data</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route("home") }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ route("retails.index") }}">Retail Products List</a>
                        </li>
                        <li class="breadcrumb-item active">Add Retail Data</li>
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
                            <form method="post" action="{{ route('retails.store') }}">
                                <div class="form-group">
                                    @csrf
                                    <label for="products_id">Select an Item:</label>
                                    <select id="products_id" name="products_id" class="form-control">
                                        <option value="" selected disabled>Select an Item</option>
                                        @foreach ($products as $key => $product)
                                            <option value="{{ $key }}"> {{ $product}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="buying_price">Buying Price :</label>
                                    <input type="text" class="form-control" name="buying_price"/>
                                </div>
                                <div class="form-group">
                                    <label for="selling_price">selling Price :</label>
                                    <input type="text" class="form-control" name="selling_price"/>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity :</label>
                                    <input type="text" class="form-control" name="quantity"/>
                                </div>
                                <div class="form-group">
                                    <label for="unit">unit :</label>
                                    <input type="text" class="form-control" name="unit"/>
                                </div>
                                <div class="form-group">
                                    <label for="reorder">Reorder Level :</label>
                                    <input type="text" class="form-control" name="reorder"/>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Item</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
