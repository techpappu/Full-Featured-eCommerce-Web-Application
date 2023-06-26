<x-front-end.master>
    @section('page-title')
    Checkout
    @endsection
    @section('breadcrumbs')
    <ul>
        <li>home</li>
        <li>Shop</li>
        <li>Checkout</li>
    </ul>
    @endsection
    @section('content')
    <!-- Container -->
    <div class="container">
        @if ($data['shippings']->count()>0)
            <!-- CHeckout Content / Start -->
            <form action="{{route('checkout.post')}}" method="POST">
                @csrf
                
                <div class="eight columns">
                    <x-front-end.validationAlert></x-front-end.validationAlert>
                    <!-- Checkout Content -->
                    <div class="checkout-section active"><span>1</span> Billing Details</div>
                    <div class="checkout-content">

                        <div class="fullwidth">
                            <label class="billing">Country: <abbr>*</abbr></label>
                            <select>
                                <option value="BD">Bangladesh</option>
                            </select>
                        </div>
                        <div class="hidden-field">
                        </div>


                        <div class="half first">
                            <label>First Name: <abbr>*</abbr></label>
                            <input type="text" name="first_name" placeholder=""value="{{auth()->check() ? auth()->user()->profile->first_name : '' }}" />
                        </div>

                        <div class="half">
                            <label>Last Name: <abbr>*</abbr></label>
                            <input type="text" name="last_name" placeholder="" value="{{auth()->check() ? auth()->user()->profile->last_name : '' }}" />
                        </div>

                        <label>Street Address: <abbr>*</abbr></label>
                        <input type="text" name="address" class="input-text " value="{{auth()->check() ? auth()->user()->profile->address : '' }}" />

                        <div class="half first">
                            <label>Town / City: <abbr>*</abbr></label>
                            <input type="text" name="city" placeholder="" value="{{auth()->check() ? auth()->user()->profile->city : '' }}" />
                        </div>
                        
                        <div class="half">
                            <label>Postcode / Zip:<abbr>*</abbr></label>
                            <input type="text" name="postcode" placeholder="" value="{{auth()->check() ? auth()->user()->profile->postcode : '' }}" />
                        </div>

                        <div class="fullwidth">
                            <label>District: <abbr>*</abbr></label>
                            <input type="text" name="district" id="" value="{{auth()->check() ? auth()->user()->profile->district : '' }}">
                        </div>

                        <div class="half first">
                            <label>Email Adress: <abbr>*</abbr></label>
                            <input type="text" name="email" placeholder="" value="{{auth()->check() ? auth()->user()->email : '' }}" />
                        </div>

                        <div class="half">
                            <label>Phone: <abbr>*</abbr></label>
                            <input type="text" name="phone" placeholder="" value="{{auth()->check() ? auth()->user()->profile->phone : '' }}" />
                        </div>


                        <div class="clearfix"></div>

                    </div>


                    <div class="checkout-section active"><span>2</span> Delivery</div>
                    <div class="checkout-delivery active">

                        <ul class="delivery-options">
                            <li><strong>Choose delivery option below</strong></li>
                            
                                @foreach ($data['shippings'] as $shipping )
                                <li>
                                    <input id="shipping-address" type="radio" name="shipping_id" value="{{$shipping->id}}" />
                                    <label for="shipping-address" class="checkbox">{{$shipping->label}} <span>{{$settings->currency_prefix}} {{$shipping->amount}}</span></label>
                                </li> <br>
                                @endforeach
                                <div class="clearfix"></div>
                        </ul>

                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="continue button color">Continue</button>
                    <a href="checkout-payment-order-review.html">
                        <div class="checkout-section"><span>3</span> Payment & Order Review</div>
                    </a>

                </div>
            </form>
             <!-- CHeckout Content / End -->
            <!-- Checkout Cart -->
            <div class="eight columns checkout-page">
                <div class="checkout-section cart">Shopping Cart</div>
                <!-- Cart -->
                <table class="checkout cart-table responsive-table-checkout" id="cart-checkout-page-item">

                </table>

                <!-- Apply Coupon Code / Buttons -->
                <table class="cart-table bottom">

                    <tr>
                        <th class="checkout-totals">
                            <div class="checkout-subtotal">
                                Subtotal: <span id="cart-total-amount"></span>
                            </div>
                        </th>
                    </tr>

                </table>
            </div>
            <!-- Checkout Cart / End -->
        @else
            <div class="notification error closeable">
                <p>Shipping & Payment method are not set! Can not proceed with Checkout!</p>
                <a class="close"></a>
            </div>
        @endif
        
       
    </div>
    <!-- Container / End -->

    <div class="margin-top-50"></div>
    @endsection
</x-front-end.master>
