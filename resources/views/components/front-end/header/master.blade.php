<!-- Header
================================================== -->
<div class="container">

	<!-- Logo -->
	<div class="four columns">
			<div id="logo">
				<h1><a href="{{route('home')}}"><img src="{{asset('/')}}images/logo.png" alt="Trizzy" /></a></h1>
			</div>
	</div>
	

	<!-- Additional Menu -->
	<div class="twelve columns">
		<div id="additional-menu">
			<ul>
				<li><a href="shopping-cart.html">Shopping Cart</a></li>
				<li><a href="wishlist.html">WishList <span>(2)</span></a></li>
				<li><a href="checkout-billing-details.html">Checkout</a></li>
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