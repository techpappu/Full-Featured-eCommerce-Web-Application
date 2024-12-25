<x-front-end.master>
    @section('page-title')
    All Categories
    @endsection
    @section('breadcrumbs')
    <ul>
        <li>home</li>
        <li><a href="{{route('categories')}}">Categories</a></li>
        <li>{{$data['cat']->name}}</li>
    </ul>
    @endsection
    @section('content')
    <div class="container">

        <!-- Sidebar
        ================================================== -->
            <div class="four columns">
        
                <!-- Categories -->
                <div class="widget margin-top-0">
                    <h3 class="headline">Categories</h3><span class="line"></span><div class="clearfix"></div>
        
                    <ul id="categories">
                        @foreach ($data['category'] as $row)
                            <li>
                                <a 
                                class="{{ Request::is('category/'.$row->id.'*') ? 'active' : '' }}"
                                href="{{route('category.single',['id'=>$row->id,'slug'=>$row->getSlug($row->name)])}}"
                                >
                                {{$row->name}} <span>({{$row->products()->count()}})</span></a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
        
                </div>
        
        
                 <!-- Widget -->
                 <div class="widget">
                     <h3 class="headline">Filter By Price</h3><span class="line"></span><div class="clearfix"></div>
        
                    <div id="price-range">
                        <div class="padding-range"><div id="slider-range"></div></div>
                        <label for="amount">Price:</label>
                        <input type="text" id="amount"/>
                        <a href="#" class="button color">Filter</a>
                    </div>
                    <div class="clearfix"></div>
                 </div>
        
            </div>
        
        
            <!-- Content
            ================================================== -->
            <div class="twelve columns">
        
                <!-- Ordering -->
                <select class="orderby">
                    <option>Default Sorting</option>
                    <option>Sort by Popularity</option>
                    <option>Sort by Newness</option>
                </select>
                 <!-- Products -->
            <x-front-end.product.grid :rows="$data['products']" :pagination=true :columns="$data['columns']" ></x-front-end.product.grid>
            </div>
        </div>
    @endsection
</x-front-end.master>
