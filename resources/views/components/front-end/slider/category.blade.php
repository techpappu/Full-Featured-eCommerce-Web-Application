<div class="container">
	<style>
		.portfolio-holder a img{height: 220px !important;}
	</style>

	<!-- Headline -->
	<div class="sixteen columns">
		<h3 class="headline">Featured Categories</h3>
		<span class="line margin-bottom-0"></span>
	</div>

	<!-- Carousel -->
	<div id="new-arrivals" class="showbiz-container sixteen columns" >

		<!-- Navigation -->
		<div class="showbiz-navigation">
			<div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
			<div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
		</div>
		<div class="clearfix"></div>

		<!-- Products -->
		<div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
			<div class="overflowholder">

				<ul>

					<!-- Product #1 -->
					@foreach ( $rows as $row )
					<li>
						<figure class="portfolio-item">
							<div class="portfolio-holder">
								<a href="{{route('category.single',['id'=>$row->id,'slug'=>$row->getSlug($row->name)])}}">
									@if ($row->hasMedia('category'))
										<img alt="" src="{{$row->getFirstMediaUrl('category')}}"/>
									@else
										<img alt="" src="images/portfolio/portfolio-01.jpg"/>
									@endif
									<div class="hover-cover"></div>
									<div class="hover-icon"></div>
								</a>
							</div>

							<a href="{{route('category.single',['id'=>$row->id,'slug'=>$row->getSlug($row->name)])}}">
								<section class="item-description">
									<span>{{$row->name}}</span>
									<h5>Browse Products</h5>
								</section>
							</a>
						</figure>
					</li>
					@endforeach

				</ul>
				<div class="clearfix"></div>

			</div>
			<div class="clearfix"></div>
		</div>
	</div>

</div>