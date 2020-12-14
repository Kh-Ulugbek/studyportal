<div class="result-page">
    <div class="result"><h2>@lang('main.search_results'):</h2></div>
    <div class="r-partners">
        <div class="container">
            <div class='partners'>
                @foreach($universities as $university)
                <div>
                    <div class="item">
                        <div class="head">
                            <div class="img">
                                <img src="{{asset('images/partners')}}/list/{{$university->logo}}">
                            </div>
                            <div class="info">
                                <div class="inner">
                                    <h5>
                                        {{$university->name}}
                                    </h5>
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{$university->city}}, {{$university->country->name}}
                                    </div>
                                    <a class="link" href="{{route('university.show', $university->id)}}">@lang('main.partners.more_info')</a>
                                </div>
                            </div>
                        </div>
                        <img class="img" src="{{asset('images/partners')}}/{{$university->image}}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="news main-news">
        <div class="container">
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
                                {{$new->title}}
                            </h6>
                            <p>
                                {{$new->description}}
                            </p>
                            <a href="{{route('news.show', $new->id)}}">@lang('main.slider.read-more')</a>
                        </div>
                    </div>
                </div>
@endforeach
            </div>
        </div>
    </div>

    <div class="online-labrary books">
        <div class="container">
            <div class="books">
                @foreach($books as $book)
                <div class="item">
                    <div class="img">
                        <img src="{{asset('images/books')}}/{{$book->image}}">
                    </div>
                    <div class="info">
                        <h6 class="white-blue-ball">
                            {{$book->name}}
                        </h6>
                        <div class="data">
                            <span>@lang('main.library_content.download_date')</span>
                            <p>{{$book->created_at->format('d.m.Y')}}</p>
                            <a href="{{route('getBook', $book->file_name)}}"><img src="images/download.png"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>