<x-front-end.master>
    @section('page-title')
    Shop
    @endsection
    @section('breadcrumbs')
    <ul>
        <li>home</li>
        <li>Product</li>
        <li><a
                href="{{ route('category.single',['id'=>$data['category']->id,'slug'=>$data['category']->getSlug($data['category']->name)]) }}">{{ $data['category']->name }}</a>
        </li>
        <li>{{ $data['row']->name }}</li>
    </ul>
    @endsection
    @section('content')




    <div class="container">

        <!-- Slider
        ================================================== -->
        <div class="eight columns">
            <div class="slider-padding">
                <div id="product-slider-vertical" class="royalSlider rsDefault">
                    @foreach ($data['row']->getMedia('product') as $image)
                    <a href="{{$image->getUrl()}}" class="mfp-gallery" title="First Title"><img class="rsImg"
                        src="{{$image->getUrl()}}" data-rsTmb="{{$image->getUrl()}}"
                        alt="" /></a>
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


        <!-- Content
        ================================================== -->
        <div class="eight columns">
            <div class="product-page">

                <!-- Headline -->
                <section class="title">
                    <h2>{{$data['row']->name}}</h2>
                    @if ($data['row']->sale_price)
                    <div class="d-flex flex-row">
                        <span class="product-price-discount">{{$data['row']->price}}</span>
                        <span class="product-price ">{{$data['row']->sale_price}}</span>
                    </div>
                    @else
                    <span class="product-price">${{$data['row']->price}}</span>
                    @endif
                    
                </section>

                <!-- Text Parapgraph -->
                <section>
                    <p class="margin-reset">{{$data['row']->description}}</p>

                    <!-- Share Buttons -->
                    <div class="share-buttons">
                        <ul>
                            <li><a href="#">Share</a></li>
                            <li class="share-facebook"><a href="#">Facebook</a></li>
                            <li class="share-twitter"><a href="#">Twitter</a></li>
                            <li class="share-gplus"><a href="#">Google Plus</a></li>
                            <li class="share-pinit"><a href="#">Pin It</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>

                </section>


                <section class="linking">

                    <form action='#'>
                        <div class="qtyminus"></div>
                        <input type='text' name="quantity" value='1' class="qty" />
                        <div class="qtyplus"></div>
                    </form>

                    <a href="#" class="button adc">Add to Cart</a>
                    <div class="clearfix"></div>

                </section>

            </div>
        </div>

    </div>
    <div class="container">
        <div class="sixteen columns">
                <!-- Tabs Navigation -->
                <ul class="tabs-nav">
                    <li><a href="#tab3">Reviews <span class="tab-reviews">(0)</span></a></li>
                </ul>
    
                <!-- Tabs Content -->
                <div class="tabs-container">
                    <div class="tab-content" id="tab3">
    
                        <!-- Reviews -->
                        <section class="comments">
                            <p class="margin-bottom-10">There are no reviews yet.</p>
    
                            <a href="#small-dialog" class="popup-with-zoom-anim button color margin-left-0">Add Review</a>
    
                            <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                                <h3 class="headline">Add Review</h3><span class="line margin-bottom-25"></span><div class="clearfix"></div>
    
                                <!-- Form -->
                                <form id="add-comment" class="add-comment">
                                    <fieldset>
    
                                        <div>
                                            <label>Name:</label>
                                            <input type="text" value=""/>
                                        </div>
    
                                        <div>
                                            <label>Rating:</label>
                                            <span class="rate">
                                                <span class="star"></span>
                                                <span class="star"></span>
                                                <span class="star"></span>
                                                <span class="star"></span>
                                                <span class="star"></span>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
    
                                        <div class="margin-top-20">
                                            <label>Email: <span>*</span></label>
                                            <input type="text" value=""/>
                                        </div>
    
                                        <div>
                                            <label>Review: <span>*</span></label>
                                            <textarea cols="40" rows="3"></textarea>
                                        </div>
    
                                    </fieldset>
    
                                    <a href="#" class="button color">Add Review</a>
                                    <div class="clearfix"></div>
    
                                </form>
                            </div>
    
                        </section>
    
                    </div>
                    <!-- for fixing the tab hinding issue just use this Tabs Content just extra tab content -->
                    <div class="tab-content" id="tab4"></div>
    
                </div>
        </div>
    </div>
    <!-- Related Products -->
<div class="container margin-top-5">

	<!-- Headline -->
	<div class="sixteen columns">
		<h3 class="headline">Related Products</h3>
		<span class="line margin-bottom-0"></span>
	</div>

	<!-- Related Products -->
    <x-front-end.product.grid :rows="$data['related_product']" :pagination=false :columns="$data['columns']"></x-front-end.product.grid>
</div>

<div class="margin-top-50"></div>
    @endsection
</x-front-end.master>
