{!! $banner !!}

<div class="news pb-80">
    <div class="container">
        <div class="news-content">
           @foreach($news as $new)
            <div class="new">
                <div class="date">
                    <span>{{$new->created_at->format('d')}}</span>
                    <div style="text-transform: capitalize;">{{$new->created_at->translatedFormat('M')}}</div>
                </div>
                <img src="{{asset('images/news')}}/{{$new->image}}">
                <div class="item">
                    <h6>
                        {{$new->__('title')}}
                    </h6>
                    <p>
                        {{$new->__('description')}}
                    </p>
                    <a href="{{route('news.show', $new->id)}}">@lang('main.slider.read-more')</a>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</div>

{!! $world_news !!}
