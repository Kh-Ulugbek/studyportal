
<div class="news main-news">
    <div class="container">
        <h2>
            @lang('main.news.news')
            <p>
                @lang('main.news.get_latest_news')
            </p>
        </h2>
        <div class="news-content">
            @foreach($news as $new)
            <div>
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
            </div>
            @endforeach
        </div>
        <a href="http://new.studyportal.uz/public/news" class="show-more">
            @lang('main.news.all_news')
        </a>
    </div>
</div>