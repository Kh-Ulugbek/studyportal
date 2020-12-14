<div class="another-reviews">
    <img class="bg-review" src="images/{{$bgimage}}">
    <div class="row">
        <div class="col-5">
            <img src="{{asset('images')}}/student-w.png">
            <h5>#@lang('main.cards.ambassador')</h5>
        </div>
        <div class="col-7">
            <div class="slider-reviews">
                @foreach($articles as $article)
                <div>
                    <div class="item">
                        <a href="{{route('article.show.page', $article->id)}}" class="card">
                            <img src="{{asset('images/card-reviews')}}/{{$article->image}}">
                            <p>
                                {{$article->title}}
                            </p>
                            <div class="stat">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="date text-capitalize">{{$article->created_at->translatedFormat('d M, Y')}}</div>
                            </div>
                        </a>
                        <div class="review-content">
                            <div class="img">
                                <img src="{{route('get.useravatar', $article->user->id)}}">
                            </div>
                            <div class="info">
                                <h5>{{$article->user->name}} {{$article->user->last_name}}</h5>
                                <span>{{$article->user->userData['direction']}}</span>
                                <p>{{$article->user->userData['study']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>