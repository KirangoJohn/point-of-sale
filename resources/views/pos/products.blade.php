@extends('layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/print-receipt.css')}}">
@endsection
@section('content')
    <div class="container">
    <h1>POS</h1>
        <hr>

    <a href="{{url('/home')}}" ><i class="fa fa-home" style="font-size:36px"></i></a>

        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <form action="{{ route('products.index') }}" method="GET">
                        <div class="row">
                            <div class="col-sm-5">
                                <input class="form-control" value="{{$_GET['search'] ?? ''}}" name="search" type="text"
                                       placeholder="Search Items">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" name="type" id="exampleSelect">
                                    <option
                                        value="retail" {{(isset($_GET['type'])&&$_GET['type']=='retail') || !isset($_GET['type'])?'selected':''}}>
                                        Retail
                                    </option>
                                    <option
                                        value="wholesale" {{isset($_GET['type'])&&$_GET['type']=='wholesale'?'selected':''}}>
                                        Wholesale
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Select</button>
                            </div>

                        </div>
                    </form>
                    <div class="d-grid gap-2 d-md-flex">
                    <table class="table">
                        <tr>

                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('add.to.cart', $product->id) }}">Shop</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            </div>


            <!------ CART------->
            <div class="col-sm-4">
            <form action="{{url('/cancelorder')}}" method="POST">
            @csrf
            <button class="btn btn-danger float-right bg-sm ">Cancel Sale</button>
        </form>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">SKU</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp

                            <form action="{{url('order')}}" method="POST">
                                @csrf
                                <tr data-id="{{ $id }}">
                                    <td data-th="Product">
                                    <input type="text" name="productsid[]" value=" {{ $details['id'] }}" hidden/>
                                        <input type="text" name="productname[]" value=" {{ $details['product_name'] }}" hidden=""/>
                                        {{ $details['product_name'] }}
                                    </td>
                                    <td data-th="SKU">
                                        <input type="text" name="productsku[]" value="{{ $details['sku'] }}" hidden=""/>
                                        {{ $details['sku'] }}</td>
                                    <td data-th="Price">
                                        <input type="text" name="price[]" value="{{ $details['price'] }}" hidden=""/>
                                        {{ $details['price'] }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" name="quantity[]" value="{{ $details['quantity'] }}"
                                               class="form-control quantity update-cart"/>
                                    </td>
                                    <td data-th="Subtotal" class="text-center">
                                        <input type="text" name="subtotal[]"
                                               value=" ${{ $details['price'] * $details['quantity'] }}" hidden=""/>
                                        Ksh: {{ $details['price'] * $details['quantity'] }}</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" class="text-right"><h3><strong>Total KSH: {{ $total }}</strong></h3></td>
                    </tr>

                    <tr>
                        <td colspan="5" class="text-right">
                            <input type="text" class="form-control" name="description" style="font-size:25px;"
                                   placeholder="Amount Given" required/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                        <button class="btn btn-info">Checkout</button>

                        </td>
                    </tr>
                    </form>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @if(session()->has('userOrder'))
        @include('receipt.checkout')
    @endif
@endsection

@section('scripts')
    <script type="text/javascript">

        $(".update-cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });


        $(document).ready(() => {
            if('{{session()->has('userOrder')}}') {
                printElement();
            }
        })

        function printElement() {
            let domClone = $('.print-this').clone(true);

            $('#printSection').remove();

            let printSection = document.getElementById("printSection");


            if (!printSection) {

                printSection = document.createElement("div");

                printSection.id = "printSection";

                $('body').append(printSection);

            }


            $(printSection).append(domClone);

            window.print();

        }

    </script>
@endsection
