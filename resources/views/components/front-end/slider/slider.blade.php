<!-- Slider
================================================== -->
<div class="container fullwidth-element home-slider">

	<div class="tp-banner-container">
		<div class="tp-banner">
			<ul>
				@foreach ($rows as $row)
					<!-- Slide 1  -->
					<li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000">
						@if ($row->hasMedia('slide'))
							<img src="{{$row->getFirstMediaUrl('slide')}}"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
						@else
							<img src="{{asset('/')}}images/slider5.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
						@endif
						
						<div class="caption dark sfb fadeout" style="text-align: center" data-x="center" data-y="165" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
						   <h2>{{$row->title}}</h2>
					   </div>
				   </li>
				@endforeach
			</ul>
		</div>
	</div>
</div>