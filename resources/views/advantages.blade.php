<div class="advantages">
    <div class="container">
        <h2>@lang('main.advantages.advantages')</h2>
        <div class="grid">
            @foreach($advantages as $advantage)
                <div class="item">
                    <div class="img wow animate__zoomIn" data-wow-duration="1500ms">
                        <img src="{{asset('images/icons')}}/{{$advantage->image}}">
                    </div>
                    <div class="text wow animate__slideInUp" data-wow-duration="1000ms">
                        <p>
                            {{$advantage->__('text')}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>