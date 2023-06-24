<x-front-end.master>
    @section('page-title')
    Payment
    @endsection
    @section('breadcrumbs')
    <ul>
        <li>home</li>
        <li>Shop</li>
        <li>Checkout</li>
        <li>Payment</li>
    </ul>
    @endsection
    @section('content')
    <!-- Container -->
    <div class="container">
        <x-front-end.message></x-front-end.message>
        <div class="eight columns">


            <!-- Checkout Content -->
            <div class="checkout-section"><span>1</span> Billing Details </div>
            <div class="checkout-content">

                <div class="four columns alpha">
                    <ul class="address-review">
                        <li><strong>Billing Address</strong></li>
                        <li>{{$data['invoice']->user->profile->first_name}} {{$data['invoice']->user->profile->last_name}}</li>
                        <li>{{$data['invoice']->user->profile->address}}</li>
                        <li>{{$data['invoice']->user->profile->city}}</li>
                        <li> {{$data['invoice']->user->profile->postcode}}</li>
                        <li> {{$data['invoice']->user->profile->district}}</li>
                        <li>{{$data['invoice']->user->profile->phone}}</li>
                    </ul>
                </div>
                <div class="four columns alpha omega">
                    <ul class="address-review">
                        <li><strong>Shipping Address</strong></li>
                        <li>Same as Billing Address</li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>


            <div class="checkout-section"><span>2</span> Delivery</div>
            <div class="checkout-delivery">

                <div class="eight columns alpha omega">
                    <ul class="address-review delivery">

                        <li><strong>{{$data['invoice']->shipping->label}} <span
                                    class="delivery-summary">{{$settings->currency_prefix}}
                                    {{$data['invoice']->shipping->amount}} <span class="sep">|</span> Delivery in 2 to 3
                                    Business Days</span></strong></li>
                    </ul>
                </div>
                <div class="clearfix"></div>

            </div>
            <div class="clearfix"></div>

            <div class="checkout-section active"><span>3</span> Payment & Order Review</div>
            <form action="{{route('checkout.payment.post',$data['invoice']->id)}}" method="post">
                @csrf
                <div class="checkout-summary">
                    <div class="eight columns payment-selection">
                        <ul>
                            <li>
                                <input type="radio" name="payment" id="COD" value="COD">
                                <label for="COD">Cash On Delivery</label>
                            </li>
                                <div class="clearfix"></div>
                        </ul>
                    </div>
                </div>

                <button type="submit" class="continue button color" onclick="clearCart()">Place Order</button>
            </form>
        </div>
        <!-- Checkout Content / End -->


        <!-- Checkout Cart -->
        <div class="eight columns">
            <div class="checkout-section cart">Shopping Cart</div>
            <!-- Cart -->
            <table class="checkout cart-table responsive-table-payment">

                <tr>
                    <th class="hide-on-mobile">Item</th>
                    <th></th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>

                <!-- Items -->
                @foreach ($data['invoice']->invoiceItems as $items)
                <tr>
                    @if ($items->product->hasMedia('product'))
                        <td class="hide-on-mobile"><img src="{{$items->product->getFirstMediaUrl('product','preview')}}" alt="" style="width:50px;height:50px" /></td>
                    @else
                        <td class="hide-on-mobile"><img src="{{asset('/')}}images/small_product_list_08.jpg" alt="" /></td>
                    @endif
                    
                    <td class="cart-title"><a href="#">{{$items->product->name}}</a></td>
                    <td>{{$items->product->price}}</td>
                    <td class="qty-checkout">{{$items->quantity}}</td>
                    <td class="cart-total">{{$settings->currency_prefix}} {{number_format((float)$items->total,2,'.','')}}</td>
                </tr>
                @endforeach

            </table>

            <!-- Apply Coupon Code / Buttons -->
            <table class="cart-table bottom">

                <tr>
                    <th class="checkout-totals">
                        <div class="checkout-subtotal">Subtotal: <span>{{$settings->currency_prefix}} {{$data['invoice']->gross_total}}</span></div><br>
                        <div class="checkout-subtotal">Shipping ({{$data['invoice']->shipping->label}}): <span>{{$settings->currency_prefix}} {{number_format((float)$data['invoice']->shipping->amount, 2, '.', '')}}</span></div><br>
                        @foreach ($data['invoice']->invoiceTaxes as $taxes )
                            <div class="checkout-subtotal">{{$taxes->label}}: <span>{{$settings->currency_prefix}} {{number_format((float)$taxes->amount,2,'.','')}}</span></div><br>
                        @endforeach
                        <div class="checkout-subtotal">total Taxes: <span>{{$settings->currency_prefix}} {{number_format((float)$data['invoice']->tax_total,2,'.','')}}</span></div><br>
                        <div class="checkout-subtotal summary">Order Total: <span>{{$settings->currency_prefix}} {{number_format((float)$data['invoice']->grand_total,2,'.'.'')}}</span></div>
                    </th>
                </tr>

            </table>
        </div>
        <!-- Checkout Cart / End -->


    </div>
    <!-- Container / End -->

    <div class="margin-top-50"></div>
    @endsection
</x-front-end.master>
