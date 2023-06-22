<!-- Top Bar
================================================== -->
<div id="top-bar">
	<div class="container">

		<!-- Top Bar Menu -->
		<div class="ten columns">
			<ul class="top-bar-menu">
				@if (!empty($settings->phone))
					<li><i class="fa fa-phone"></i>{{$settings->phone}}</li>
				@endif
				@if (!empty($settings->email))
					<li><i class="fa fa-envelope"></i>
						<a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
					</li>
				@endif
				<li>
					<div class="top-bar-dropdown">
						<span>English</span>
						<ul class="options">
							<li><div class="arrow"></div></li>
							<li><a href="#">English</a></li>
							<li><a href="#">Polish</a></li>
							<li><a href="#">Deutsch</a></li>
						</ul>
					</div>
				</li>
				<li>
					@if (!empty($settings->currency_prefix))
						<div class="top-bar-dropdown">
							<span>{{$settings->currency_prefix}}</span>
						</div>
					@endif
				</li>
			</ul>
		</div>
		
		<!-- Social Icons -->
		<div class="six columns">
			<ul class="social-icons">
				@if (!empty($settings->facebook))
					<li><a class="facebook" href="{{$settings->facebook}}"><i class="icon-facebook"></i></a></li>
				@endif
				@if (!empty($settings->twitter))
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
				@endif
				@if (!empty($settings->youtube))
					<li><a class="youtube" href="{{$settings->facebook}}"><i class="icon-youtube"></i></a></li>
				@endif
			</ul>
		</div>

	</div>
</div>

<div class="clearfix"></div>

<!-- Header
================================================== -->
<div class="container">

	<!-- Logo -->
	<div class="four columns">
			<div id="logo">
				
					<h1><a href="{{route('home')}}">
						@if (!empty($settings->hasMedia('settings')))
							<img src="{{$settings->getFirstMediaUrl('settings')}}" alt="Trizzy" />
						@else
						<img src="{{asset('/images/logo.png')}}" alt="Trizzy" />
						@endif
					</a></h1>
				
				
			</div>
	</div>
	

	<!-- Additional Menu -->
	<div class="twelve columns">
		<div id="additional-menu">
			<ul>
				<li><a href="{{route('cart')}}">Shopping Cart</a></li>
				<li><a href="wishlist.html">WishList <span>(2)</span></a></li>
				<li><a href="my-account.html">My Account</a></li>
			</ul>
		</div>
	</div>

	
	<!-- Shopping Cart -->
	<div class="twelve columns">

		<x-front-end.header.cart></x-front-end.header.cart>

		<!-- Search -->
		<nav class="top-search">
			<form action="#" method="get">
				<button><i class="fa fa-search"></i></button>
				<input class="search-field" type="text" placeholder="Search" value=""/>
			</form>
		</nav>

	</div>

</div>


<!-- Navigation
================================================== -->
<x-front-end.header.navigation></x-front-end.header.navigation>