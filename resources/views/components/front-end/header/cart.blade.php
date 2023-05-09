<div id="cart">

    <!-- Button -->
    <div class="cart-btn">
        <a href="#" class="button adc total">{{$settings->currency_prefix}} <span class="totalAmount">0.00</span></a>
    </div>

    <div class="cart-list">

        <div class="arrow"></div>

        <div class="cart-amount">
            <span><span class="cart-item-count"></span> items in the shopping cart</span>
        </div>

        <ul class="ul-cart-List">
        </ul>

        <div class="cart-buttons button">
            <a href="{{route('cart')}}" class="view-cart checkout"><span data-hover="View Cart"><span>View
                        Cart</span></span></a>
        </div>
        <div class="clearfix">

        </div>
    </div>

</div>
