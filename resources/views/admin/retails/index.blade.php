@extends('layouts.admin_layout.admin_layout')
@section('title','Retail Products List')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Retail Products List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route("home") }}">Home</a></li>
                        <li class="breadcrumb-item active">Retail Products List</li>
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
                        <div class="card-header">
                            @if(checkPermission(['superadmin']))
                                <div><a class="btn btn-primary mt-2  float-right" href="{{ route('retails.create') }}"
                                        role="button">Add New retail Products</a></div>

                            @endif
                            <div class="row">
                                <div class="col-sm-6 mt-2">
                                    <form action="{{ route('retails.index') }}" id="search_form" method="GET">
                                        <input type="text" value="{{ $_GET['search'] ?? '' }}" class="form-control" placeholder="Search by name"
                                               name="search">
                                    </form>
                                </div>
                                <div class="col-sm-6 d-flex mt-2">
                                    <button class="btn btn-primary mr-2" onclick="$('#search_form').submit()" type="button">
                                        Search
                                    </button>

                                    <form action="{{ route('retails.index') }}">
                                        <button class="btn btn-success" type="submit">Refresh</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>SKU</th>
                                    <th>Unit</th>
                                    <th>Manf Date</th>
                                    <th>Expiry Date</th>
                                    <th>Buying Price</th>
                                    <th>Selling Price</th>
                                    <th>Quantity</th>
                                    @if(checkPermission(['superadmin']))
                                        <th colspan="2">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($retails as $retail)
                                    <tr>
                                        <td>{{ $retail->product_name }}</td>
                                        <td>{{ $retail->category }}</td>
                                        <td>{{ $retail->description }}</td>
                                        <td>{{ $retail->sku }}</td>
                                        <td>{{ $retail->unit }}</td>
                                        <td>{{ $retail->manuf_date }}</td>
                                        <td>{{ $retail->exp_date }}</td>
                                        <td>{{ $retail->buying_price}}</td>
                                        <td>{{ $retail->selling_price }}</td>
                                        <td>{{ $retail->quantity }}</td>
                                        @if(checkPermission(['superadmin']))
                                            <td>
                                                <a href="{{ route('retails.edit', $retail->id)}}"
                                                   class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('retails.destroy', $retail->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

