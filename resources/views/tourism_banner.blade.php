<div class="banner-main tourism-banner">
    <div>
        <img class="banner" src="images/banners/{{$image}}">
        <div class="info-text">
            <h3><b>@lang('main.teachable') <br> @lang('main.tourism')</b></h3>
        </div>
    </div>
    <div class="regions">
        @foreach($regions as $region)
        <div>
            <a href="{{route('tourism.region', $region->slug)}}">
                <img src="{{asset($path)}}/{{$region->image}}">
                <span>{{$region->name}}</span>
            </a>
        </div>
        @endforeach
    </div>
</div>