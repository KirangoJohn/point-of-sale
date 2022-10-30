@extends('layouts.admin_layout.admin_layout')
@section('title','Wholesale Products List')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Wholesale Products List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route("home") }}">Home</a></li>
                        <li class="breadcrumb-item active">Wholesale Products List</li>
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
                                <div><a class="btn btn-primary mt-2  float-right"
                                        href="{{ route('wholesales.create') }}"
                                        role="button">Add New Wholesale Products</a></div>

                            @endif
                            <div class="row">
                                <div class="col-sm-6 mt-2">
                                    <form action="{{ route('wholesales.index') }}" id="search_form" method="GET">
                                        <input type="text" value="{{ $_GET['search'] ?? '' }}" class="form-control"
                                               placeholder="Search by name"
                                               name="search">
                                    </form>
                                </div>
                                <div class="col-sm-6 d-flex mt-2">
                                    <button class="btn btn-primary mr-2" onclick="$('#search_form').submit()"
                                            type="button">
                                        Search
                                    </button>

                                    <form action="{{ route('wholesales.index') }}">
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
                                @foreach($wholesales as $wholesale)
                                    <tr>
                                        <td>{{ $wholesale->product_name }}</td>
                                        <td>{{ $wholesale->category }}</td>
                                        <td>{{ $wholesale->description }}</td>
                                        <td>{{ $wholesale->sku }}</td>
                                        <td>{{ $wholesale->unit }}</td>
                                        <td>{{ $wholesale->manuf_date }}</td>
                                        <td>{{ $wholesale->exp_date }}</td>
                                        <td>{{ $wholesale->buying_price }}</td>
                                        <td>{{ $wholesale->selling_price }}</td>
                                        <td>{{ $wholesale->quantity }}</td>
                                        @if(checkPermission(['superadmin']))
                                            <td>
                                                <a href="{{ route('wholesales.edit', $wholesale->id)}}"
                                                   class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('wholesales.destroy', $wholesale->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

