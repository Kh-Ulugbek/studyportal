<div class="banner-main">
    <div class="controller">
		<div class="grid">
			<div class="info">
				<div class="title">
					@lang('main.slider.summer-school')
				</div>
			</div>
			<div class="arrows">
				<i class="fas fa-chevron-left"></i>
				<i class="fas fa-chevron-right"></i>
			</div>
		</div>
	</div>
    <div class="active-slide-numbers">
        <div class="current">
            .0<span>1</span>
        </div>
        <div class="total">
            0<span></span>
        </div>
    </div>
    <div class="slider-main">
        @foreach($sliders as $slider)
            <div>
                <img src="{{asset('images/slider-index')}}/{{$slider->image}}">
                <div class="info-text">
                    <div class="type">{{$slider->__('title')}}</div>
                    <h3>{!! $slider->__('text') !!}</h3>
                    <a href="{{$slider->link}}"><b>@lang('main.slider.read-more')</b></a>
                </div>
            </div>
        @endforeach
    </div>
</div>