<x-front-end.master>
    @section('page-title')
    All Categories
    @endsection
    @section('breadcrumbs')
    <ul>
        <li>home</li>
        <li>Categories</li>
    </ul>
    @endsection
    @section('content')
    <!-- Titlebar
        ================================================== -->



    <div class="container">

        <!-- Content
            ================================================== -->

        <div class="sixteen columns full-width">

            <!-- Ordering -->
            <select class="orderby">
                <option>Default Sorting</option>
                <option>Sort by Popularity</option>
                <option>Sort by Newness</option>
            </select>

        </div>

        <!-- Products -->
        <x-front-end.product.grid :rows="$data['rows']" :pagination=true :columns="$data['columns']" ></x-front-end.product.grid>

    </div>
    @endsection
</x-front-end.master>
