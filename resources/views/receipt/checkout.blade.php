@php
    $userOrder = session('userOrder')
@endphp
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container print-this my-4">
                    <section class="row text-center">
                        <h3 class="fw-bold text-uppercase">{{$userOrder->company_name}}</h3>
                        @if($userOrder->company_address != '')
                        <p>P. O. Box {{$userOrder->company_address ?? ''}}</p>
                        @endif
                        @if($userOrder->company_phone_number != '')
                        <p>Tel: {{$userOrder->company_phone_number ?? ''}}</p>
                        @endif
                        <h3 class="fw-bold text-uppercase">Cash Sale</h3>
                        <p>Date: {{date('h:ia D d F Y',strtotime(now()))}}</p>
                    </section>
                    <section class="row mx-auto">
                        <table>
                            <thead>
                            <tr class="border-top border-bottom border-dark">
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Each</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userOrder->sales as $sale)
                            <tr style="vertical-align: top">
                                <td width="50%">{{$sale->product->product_name}} {{$sale->sku}}</td>
                                <td>{{$sale->quantity}} PCS</td>
                                <td>{{number_format($sale->product->price, 2, '.', '')}}</td>
                                <td>{{number_format($sale->product->price * $sale->quantity, 2, '.', '')}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="mt-2 border-top border-dark">
                                <td><h5 class="text-uppercase fw-bold">Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        :</h5>
                                </td>
                                <td></td>
                                <td></td>
                                <td><h5 class="text-uppercase fw-bold">{{number_format($userOrder->sales->sum('total_price'), 2, '.', '')}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5 class="text-uppercase fw-bold">Cash Paid &nbsp;&nbsp;&nbsp; :</h5></td>
                                <td></td>
                                <td></td>
                                <td><h5 class="text-uppercase fw-bold">{{number_format($userOrder->payment->amount, 2, '.', '')}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5 class="text-uppercase fw-bold">Balance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</h5></td>
                                <td></td>
                                <td></td>
                                <td><h5 class="text-uppercase fw-bold">{{number_format(($userOrder->payment->amount - $userOrder->sales->sum('total_price')), 2, '.', '')}}</h5></td>
                            </tr>
                            </tfoot>
                        </table>
                    </section>
                    <section class="row mx-auto border-top border-dark">
                        <table class="mt-2 w-50">
                            <tbody>
                            <tr>
                                <td width="50%"><h5 class="text-uppercase fw-bold">Total Qty</h5></td>
                                <td class=""><h5 class="text-uppercase fw-bold">:</h5></td>
                                <td class=""><h5>&nbsp;&nbsp;{{$userOrder->sales->sum('quantity')}} {{$userOrder->sales->sum('quantity') > 1 ? 'units':'unit'}}</h5></td>
                            </tr>
                            <tr>
                                <td width="50%"><h5 class="text-uppercase fw-bold">Cashier</h5></td>
                                <td class=""><h5 class="text-uppercase fw-bold">:</h5></td>
                                <td class="white-space-wrap word-break-all"><h5>&nbsp;&nbsp;{{auth()->user()->name}}</h5></td>
                            </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
