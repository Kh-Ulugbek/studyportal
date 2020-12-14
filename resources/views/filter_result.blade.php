<div class="heading">
    <h3>
        @lang('main.filter_result.results') ({{$universities->count()}})
    </h3>
</div>
<div class="content-bookmarks">
    <div class="r-partners">
        <div class="partners">
            @if ($universities->count() > 0 )
                @foreach($universities as $university)
                    <div class="item">
                        @auth
                        <i data-route="{{route('add.bookmark', $university->id)}}" class="fas fa-bookmark"></i>
                        @endauth
                        <div class="head">
                            <div class="img">
                                <img src="{{asset($path)}}/list/{{$university->logo}}">
                            </div>
                            <div class="info">
                                <h5>
                                    {{$university->name}}
                                </h5>
                                <div class="location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{$university->city}}, {{$university->country->name}}
                                </div>
                                <a class="link" href="{{route('university.show', $university->id)}}" target="_blank">@lang('main.partners.more_info')</a>
                            </div>
                        </div>
                        <img class="img" src="{{asset($path)}}/{{$university->image}}">
                    </div>
                @endforeach
            @else
                <h3>@lang('main.filter_result.no_results')</h3>
            @endif
        </div>
    </div>
</div>