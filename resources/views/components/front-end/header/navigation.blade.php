<!-- Navigation
================================================== -->
<div class="container">
	<div class="sixteen columns">
		<a href="#menu" class="menu-trigger"><i class="fa fa-bars"></i> Menu</a>

		<nav id="navigation">
			<ul class="menu" id="responsive">
				<li><a href="{{URL::to('/')}}" class="homepage">Home</a></li>
				@foreach ( $menuCategory as $row )
					<li><a href="{{route('category.single',['id'=>$row->id,'slug'=>$row->getSlug($row->name)])}}">{{$row->name}}</a></li>
				@endforeach
				<li><a href="{{route('categories')}}">All Categories</a></li>
			</ul>
		</nav>
	</div>
</div>