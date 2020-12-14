<div class="news pb-80 ambasador">
    <div class="container">
        <div class="news-content">
@foreach($articles as $article)
                <div class="new">
                    <div class="date">
                        <span>{{$article->created_at->format('j')}}</span>
                        {{$article->created_at->translatedFormat('F')}}
                    </div>
                    <img src="{{asset('images/card-reviews')}}/{{$article->image}}">
                    <div class="item">
                        <div class="name">
                            <img src="{{route('get.useravatar', $article->user->id)}}">
                            <span>{{$article->user->name}} {{$article->user->last_name}}</span>
                        </div>
                        <h6>
                            {{$article->title}}
                        </h6>
                        <p>
                            {{$article->description}}
                        </p>
                        <a href="{{route('article.show.page', $article->id)}}" >@lang('main.slider.read-more')</a>
                    </div>
                </div>
@endforeach
        </div>
    </div>
</div>
