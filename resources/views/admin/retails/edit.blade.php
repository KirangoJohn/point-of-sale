@extends('layouts.admin_layout.admin_layout')
@section('title', 'Edit Retail Data')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Retail Data</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route("home") }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ route("retails.index") }}">Retail Products List</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Retail Data</li>
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
                            <form method="post" action="{{ route('retails.update', $retail->id ) }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            @csrf
                                            @method('PATCH')
                                            <label for="product_name">Product Name:</label>
                                            <input type="text" class="form-control" name="products_id"
                                                   value="{{ $retail->products_id }}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="cases">Buying price :</label>
                                            <input type="text" class="form-control" name="buying_price"
                                                   value="{{ $retail->buying_price }}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sku">Selling Price :</label>
                                            <input type="text" class="form-control" name="selling_price"
                                                   value="{{ $retail->selling_price }}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Quantity :</label>
                                            <input type="text" class="form-control" name="quantity"
                                                   value="{{ $retail->quantity }}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="unit">Unit :</label>
                                            <input type="text" class="form-control" name="unit"
                                                   value="{{ $retail->unit }}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Reorder :</label>
                                            <input type="text" class="form-control" name="reorder"
                                                   value="{{ $retail->reorder }}"/>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
