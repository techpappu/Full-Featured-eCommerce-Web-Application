<!-- Header
================================================== -->
<div class="container">

	<!-- Logo -->
	<div class="four columns">
			<div id="logo">
				<h1><a href="{{route('home')}}"><img src="images/logo.png" alt="Trizzy" /></a></h1>
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

		<div id="cart">
				
			<!-- Button -->
			<div class="cart-btn">
				<a href="#" class="button adc">$178.00</a>
			</div>

			<div class="cart-list">

			<div class="arrow"></div>

				<div class="cart-amount">
					<span>2 items in the shopping cart</span>
				</div>

					<ul>
						<li>
							<a href="#"><img src="images/small_product_list_08.jpg" alt="" /></a>
							<a href="#">Converse All Star Trainers</a>
							<span>1 x $79.00</span>
							<div class="clearfix"></div>
						</li>

						<li>
							<a href="#"><img src="images/small_product_list_09.jpg" alt="" /></a>
							<a href="#">Tommy Hilfiger <br /> Shirt Beat</a>
							<span>1 x $99.00</span>
							<div class="clearfix"></div>
						</li>
					</ul>

				<div class="cart-buttons button">
					<a href="shopping-cart.html" class="view-cart" ><span data-hover="View Cart"><span>View Cart</span></span></a>
					<a href="checkout-billing-details.html" class="checkout"><span data-hover="Checkout">Checkout</span></a>
				</div>
				<div class="clearfix">

				</div>
			</div>

		</div>

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