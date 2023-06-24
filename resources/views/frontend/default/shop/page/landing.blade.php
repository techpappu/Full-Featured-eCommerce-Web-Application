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

    <!-- Client Container -->
    {{-- <x-front-end.slider.clients></x-front-end.slider.clients> --}}
    <!-- Client Container / End -->
    @endsection
</x-front-end.page.master>
