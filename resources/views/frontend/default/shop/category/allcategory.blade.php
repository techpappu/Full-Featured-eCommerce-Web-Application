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
    <div class="container product-categories">

        <!-- Category #1 -->
        @foreach ($data['rows'] as $row)
        <div class="four columns">
            <a href="{{route('category.single',['id'=>$row->id,'slug'=>$row->getSlug($row->name)])}}" class="img-caption">
                <figure>
                    @if ($row->hasMedia('category'))
                    <img src="{{$row->getFirstMediaUrl('category','preview')}}"  alt="">
                    @endif
                    <figcaption>
                        <h3>{{$row->name}}</h3>
                        <span>Browse Products</span>
                    </figcaption>
                </figure>
            </a>
        </div>
        @endforeach

    </div>
    @endsection
</x-front-end.master>
