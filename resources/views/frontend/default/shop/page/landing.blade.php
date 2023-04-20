<x-front-end.page.master>
    @section('content')
    
    @if ($data['slider']->count() > 0)
    <x-front-end.slider.slider :rows="$data['slider']"></x-front-end.slider.slider>
    @endif
    
    @if ($data['category']->count() > 0)
        <x-front-end.slider.category :rows="$data['category']"></x-front-end.slider.category>
    @endif
    

    <!-- Parallax Banner
================================================== -->
    <div class="parallax-banner fullwidth-element" data-background="#000" data-opacity="0.4" data-height="200">
        <img src="images/parallax_03.jpg" alt="" />
        <div class="parallax-overlay"></div>
        <div class="parallax-title">Bringing Design To Life <span>We Build Functional Digital Products</span></div>
    </div>

    <div class="margin-top-40"></div>

    <!-- Latest Articles
================================================== -->
    <div class="container">

        <!-- Headline -->
        <div class="sixteen columns">
            <h3 class="headline">Latest Products</h3>
            <span class="line margin-bottom-30"></span>
        </div>
        <x-front-end.product.grid :rows="$data['product']" :pagination=false :columns="$data['columns']"></x-front-end.product.grid>
    </div>

    <!-- Container -->
    <div class="container margin-top-40">

        <!-- Headline -->
        <div class="sixteen columns">
            <h3 class="headline">Our Clients</h3>
            <span class="line margin-bottom-0"></span>
        </div>

        <!-- Navigation / Left -->
        <div class="one carousel column">
            <div id="showbiz_left_2" class="sb-navigation-left-2"><i class="fa fa-angle-left"></i></div>
        </div>

        <!-- ShowBiz Carousel -->
        <div id="our-clients" class="showbiz-container fourteen carousel columns">

            <!-- Portfolio Entries -->
            <div class="showbiz our-clients" data-left="#showbiz_left_2" data-right="#showbiz_right_2">
                <div class="overflowholder">

                    <ul>
                        <!-- Item -->
                        <li><img src="images/logo-01.png" alt="" /></li>
                        <li><img src="images/logo-02.png" alt="" /></li>
                        <li><img src="images/logo-03.png" alt="" /></li>
                        <li><img src="images/logo-04.png" alt="" /></li>
                        <li><img src="images/logo-05.png" alt="" /></li>
                        <li><img src="images/logo-06.png" alt="" /></li>
                        <li><img src="images/logo-07.png" alt="" /></li>
                    </ul>
                    <div class="clearfix"></div>

                </div>
                <div class="clearfix"></div>

            </div>
        </div>

        <!-- Navigation / Right -->
        <div class="one carousel column">
            <div id="showbiz_right_2" class="sb-navigation-right-2"><i class="fa fa-angle-right"></i></div>
        </div>

    </div>
    <!-- Container / End -->
    @endsection
</x-front-end.page.master>
