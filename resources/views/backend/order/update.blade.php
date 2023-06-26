<x-back-end.master>
    @section('page-title')
        Order Update
    @endsection
    @section('breadcrumb')
        <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">Update Order</a></li>
    @endsection
    @section('content')
    <style>
        
        /* Quantity
        ------------------------------------- */
        section.linking {
            border-bottom: 0;
            padding-top: 28px;
        }

        #quantity {
            position: relative;
            float: left;
        }

        .qty {
            width: 60px;
            height: 40px;
            text-align: center;
            float: left;
            padding: 8px 9px;
        }

        input.qty {
            padding: 8px 9px;
            border:1px solid #dbdcde;
        }

        .qtyplus,
        .qtyminus{
            background: #c0c0c0;
            color: #fff;
            border: none;
            float: left;
            font-family: "Font Awesome 5 Free";
            cursor: pointer;
            width: 40px;
            height: 40px;
            font-size: 30px;
            font-weight: 900;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        .qtyplus:hover,
        .qtyminus:hover {
            background: #1BB99A;
            color: #fff;
        }

        .qtyplus:before { content: "+"; }
        .qtyminus:before { content: "-"; }

        .qtyplus:before,
        .qtyminus:before {
            position: relative;
            display: block;
            top: -5px;
            left: 0px;
        }

    </style>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="panel-body">
                    <x-back-end.message></x-back-end.message>
                    <h1 class="text-left">Order Details</h1>
                    <form action="{{route('admin.order.post.update',$data['row']->id)}}" method="POST">
                        @csrf
                        <table class=" table table-bordered">
                            <tr>
                                <th>Order Date: {{date('d-m-Y', strtotime($data['row']->invoice_date))}}</th>
                                <th class="text-right">Order Status:</th>
                                <td width="300px">
                                    <div class="form-group d-flex">
                                        <select name="status" id="status" class="form-control p-0">
                                            <option value="pending" {{$data['row']->status=='pending'? 'selected' : '' }}>pending</option>
                                            <option value="processing" {{$data['row']->status=='processing'? 'selected' : '' }}>processing</option>
                                            <option value="shipped" {{$data['row']->status=='shipped'? 'selected' : '' }}>shipped</option>
                                            <option value="done" {{$data['row']->status=='done'? 'selected' : '' }}>done</option>
                                            <option value="canceled" {{$data['row']->status=='canceled'? 'selected' : '' }}>canceled</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <address>
                                        <strong>{{$data['row']->user->profile->first_name}} {{$data['row']->user->profile->last_name}}</strong><br>
                                        Address: {{$data['row']->user->profile->address}}<br>
                                        District: {{$data['row']->user->profile->district}}<br> 
                                        City: {{$data['row']->user->profile->city}} Post Code: {{$data['row']->user->profile->postcode}}<br>
                                        
                                        Phone number: {{$data['row']->user->profile->phone}}
                                    </address>
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered mt-2 text-center">
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                            </tr>
                            @foreach ($data['row']->invoiceItems as $index=>$items)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$items->product->name}}</td>
                                <td> {{$settings->currency_prefix}} {{$items->price}}</td>
                                <td width="165px">
                                    <div class="qtyminus"></div>
                                    <input type="hidden" name="items[]" id="id_{{$items->id}}" value="{{$items->id}}">
                                    <input type="hidden" name="prices[]" id="price_{{$items->id}}" value="{{$items->price}}">
                                    <input type="hidden" name="amounts[]" id="amount_{{$items->id}}" value="{{$items->price}}">
                                    <input type="text" id="quantity_{{$items->id}}" name="quantity[]" value="{{$items->quantity}}" class="qty" onchange="quantityChanged(this.id);"/>
                                    <div class="qtyplus" ></div>
                                </td>
                                <td>{{$settings->currency_prefix}} <span id="amount_text_{{$items->id}}">{{number_format((float)$items->total,2,'.','')}}</span></td>
                                                
                                
                            </tr>
                            @endforeach
                            


                            <tr>
                                <th colspan="4" class="text-right">Total:</th>
                                <th>{{$settings->currency_prefix}} <span id="grossTotal">{{$data['row']->gross_total}}</span></th>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Discount:</td>
                                <td>{{$settings->currency_prefix}} 0.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Total Tax:</td>
                                <td>{{$settings->currency_prefix}} {{number_format((float)$data['row']->tax_total,2,'.','')}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Shipping({{$data['row']->shipping->label}}):</td>
                                <td>{{$settings->currency_prefix}} {{number_format((float)$data['row']->shipping->amount, 2, '.', '')}}</td>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-right">Grand Total:</th>
                                <th>{{$settings->currency_prefix}} <span id="grandTotal">{{number_format((float)$data['row']->grand_total,2,'.'.'')}}</span></th>
                            </tr>
                        </table>

                        <p><b>Amount (In Words):</b> {{$data['numberToWord']}}</p>
                        <button class="btn btn-primary float-right">Update</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>

        </div>

    </div>

    @endsection 
    @section('script')
    <script>

        var totalAmount = {{$data['row']->gross_total ?? 0}};
        var discountAmount = 0;
        var taxAmount = {{$data['row']->tax_total ?? 0}};
        var shippingAmount = {{$data['row']->shipping->amount ?? 0}};
        var grandTotal = 0;

        function quantityChanged(me)
        {
            var id = me.split('_');

            var itemId = id[1];

            var qty = parseInt($('#quantity_'+itemId).val());
            var price = parseFloat($('#price_'+itemId).val());

            var amount = parseFloat(price * qty);

            $('#amount_'+itemId).val(amount.toFixed(2));

            $('span#amount_text_'+itemId).html(amount.toFixed(2));

            calculateTotal();
        }

        function calculateTotal()
        {
            window.totalAmount = 0;

            var hiddenAmounts = $('input[name="amounts[]"]');

            for(var i=0; i < hiddenAmounts.length; i++)
            {
                window.totalAmount = parseFloat(window.totalAmount) + parseFloat(hiddenAmounts[i].value);
            }

            $('#grossTotal').html(window.totalAmount.toFixed(2));

            window.grandTotal = parseFloat(window.totalAmount) - parseFloat(window.discountAmount) + parseFloat(window.taxAmount) + parseFloat(window.shippingAmount);

            $('#grandTotal').html(window.grandTotal.toFixed(2));

        }

		var thisrowfield;

		$('.qtyplus').click(function(e){
			e.preventDefault();

			thisrowfield = $(this).parent().parent().find('.qty');

			var currentVal = parseInt(thisrowfield.val());
			if (!isNaN(currentVal)) {
				thisrowfield.val(currentVal + 1);
                thisrowfield.trigger('onchange');
			} else {
				thisrowfield.val(0);
                thisrowfield.trigger('onchange');
			}
		});

		$(".qtyminus").click(function(e) {
			e.preventDefault();
			thisrowfield = $(this).parent().parent().find('.qty');
			var currentVal = parseInt(thisrowfield.val());
			if (!isNaN(currentVal) && currentVal > 1) {
				thisrowfield.val(currentVal - 1);
                thisrowfield.trigger('onchange');
			} else {
				thisrowfield.val(0);
                thisrowfield.trigger('onchange');
			}
		});
    </script>
    @endsection
</x-back-end.master>