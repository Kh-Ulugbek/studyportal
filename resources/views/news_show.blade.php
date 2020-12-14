{!! $banner !!}

<div class="post-content">
    <div class="container">
        <div class="img-title">
            <img src="{{asset($path)}}/{{$post->image}}">
            <div class="text">
                @lang('main.new')
            </div>
        </div>
    </div>
    <div class="date">
        <img src="{{asset('images')}}/circles.png">
        <div class="container">
            <span style="text-transform: capitalize;">{{$post->created_at->translatedFormat('d M, Y')}}</span>
            <a href="#">@lang('main.by') Studyportal.uz</a>
        </div>
    </div>
    <div class="content-m">
        <div class="container p-in">
            {!! $post->__('text') !!}
        </div>
    </div>
</div>

<div class="news another-news">
    <div class="container">
        <h2>
            @lang('main.other_articles')
        </h2>
        <div class="news-content">
            @foreach($other_post as $other)
            <div class="new">
                <div class="date">
                    <span>{{$other->created_at->format('d')}}</span>
                    <div style="text-transform: capitalize;">{{$other->created_at->translatedFormat('M')}}</div>
                </div>
                <img src="{{asset($path)}}/{{$other->image}}">
                <div class="item">
                    <h6>
                        {{$other->__('title')}}
                    </h6>
                    <p>
                        {{$other->__('description')}}
                    </p>
                    <a href="{{route('news.show', $other->id)}}">@lang('main.slider.read-more')</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

{!! $world_news !!}