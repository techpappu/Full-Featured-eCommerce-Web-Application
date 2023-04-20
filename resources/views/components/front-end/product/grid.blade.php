<div class="products">
    <style>
        .mediaholder a img{height: 220px !important;}
    </style>
    <!-- Product #3 -->
    @foreach($rows as $row)
        <div class="{{$columns}} columns">
            <figure class="product">
                @if ($row->sale_price)
                    <div class="product-discount">SALE</div>
                @endif
                <div class="mediaholder">
                    <a href="{{route('product.single',['id'=>$row->id,'slug'=>$row->getSlug($row->name)])}}">
                        @if ($row->hasMedia('product'))
                            <img src="{{$row->getFirstMediaUrl('product','preview')}}"   alt="">
                            <div class="cover">
                                <img alt="" src="{{$row->getFirstMediaUrl('product','preview')}}"/>
                            </div>
                        @else
                            <img alt="" src="{{ asset('/') }}images/shop_item_03.jpg" />
                            <div class="cover">
                                <img alt=""
                                    src="{{ asset('/') }}images/shop_item_03_hover.jpg" />
                            </div>
                        @endif
                        
                    </a>
                    <a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                </div>

                <a href="variable-product-page.html">
                    <section>
                        <span class="product-category">{{$row->categories()->first()->name}}</span>
                        <h5>{{$row->name}}</h5>
                        @if ($row->sale_price)
                            <span class="product-price-discount">{{$row->price}}<i>{{$row->sale_price}}</i></span>
                        @else
                            <span class="product-price">{{$row->price}}</span>
                        @endif
                    </section>
                </a>
            </figure>
        </div>
    @endforeach
    <div class="clearfix"></div>
    <!-- Pagination -->
    @if ($pagination)
        {{ $rows->links('vendor.pagination.frontend') }}
    @endif
    
</div>