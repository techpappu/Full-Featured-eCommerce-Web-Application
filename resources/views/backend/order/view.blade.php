<x-back-end.master>
    @section('page-title')
        Order Invoice
    @endsection
    @section('breadcrumb')
        <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">Order Invoice</a></li>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- <div class="panel-heading">
                    <h4>Invoice</h4>
                </div> -->
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="float-sm-left">
                            <h4 class="text-uppercase mt-0">Uplon</h4>
                        </div>
                        <div class="float-sm-right mt-4 mt-sm-0">
                            <h5>Invoice # {{$data['row']->id}} <br>
                                <small>{{$data['row']->invoice_date}}</small>
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="float-sm-left mt-4">
                                <address>
                                    <strong>{{$data['row']->user->profile->first_name}} {{$data['row']->user->profile->last_name}}</strong><br>
                                    {{$data['row']->user->profile->address}}<br>
                                    {{$data['row']->user->profile->city}} {{$data['row']->user->profile->district}}<br>
                                    <abbr title="Phone">P:</abbr> {{$data['row']->user->profile->phone}}
                                </address>
                            </div>
                            <div class="mt-4 text-sm-right">
                                <p><strong>Order Date: </strong>{{$data['row']->invoice_date}}</p>
                                <p><strong>Order Status: </strong> <span class="badge badge-danger">{{$data['row']->status}}</span></p>
                                <p><strong>Order ID: </strong> #{{$data['row']->id}}</p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-nowrap">
                                    <thead>
                                    <tr><th>#</th>
                                        <th>Image</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th>Total</th>
                                    </tr></thead>
                                    <tbody>
                                        @foreach ($data['row']->invoiceItems as $index=>$items)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                @if ($items->product->hasMedia('product'))
                                                    <td><img src="{{$items->product->getFirstMediaUrl('product','preview')}}" alt="" style="width:50px;height:50px" /></td>
                                                @else
                                                    <td><img src="{{asset('/')}}images/small_product_list_08.jpg" alt="" /></td>
                                                @endif
                                                
                                                <td>{{$items->product->name}}</td>
                                                <td>{{$items->quantity}}</td>
                                                <td>{{$settings->currency_prefix}} {{number_format((float)$items->product->getRawOriginal('price'),2,'.','')}}</td>
                                                <td>{{$settings->currency_prefix}} {{number_format((float)$items->total,2,'.','')}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix mt-5">
                                <h5 class="small"><b>PAYMENT TERMS AND POLICIES</b></h5>

                                <small class="text-muted">
                                    All accounts are to be paid within 7 days from receipt of
                                    invoice. To be paid by cheque or credit card or direct payment
                                    online. If account is not paid within 7 days the credits details
                                    supplied as confirmation of work undertaken will be charged the
                                    agreed quoted fee noted above.
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-right mt-4">
                                <p><b>Sub-total:</b> {{$settings->currency_prefix}} {{$data['row']->gross_total}}</p>
                                <p>Shipping ({{$data['row']->shipping->label}}): <span>{{$settings->currency_prefix}} {{number_format((float)$data['row']->shipping->amount, 2, '.', '')}}</p>
                                    @foreach ($data['row']->invoiceTaxes as $taxes )
                                    <p>{{$taxes->label}}: <span>{{$settings->currency_prefix}} {{number_format((float)$taxes->amount,2,'.','')}}</span></p><br>
                                @endforeach
                                <hr>
                                <p>total Taxes: <span>{{$settings->currency_prefix}} {{number_format((float)$data['row']->tax_total,2,'.','')}}</span></p><br>
                                <hr>
                                <h3>{{$settings->currency_prefix}} {{number_format((float)$data['row']->grand_total,2,'.'.'')}}</h3>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-print-none">
                        <div class="float-right">
                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                            <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    @endsection 
</x-back-end.master>