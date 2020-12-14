{!! $banner !!}

<div class="content-Ambassador">
    <div class="container">
        <div class="date-n-rate">
            <div class="date text-capitalize">{{$article->created_at->translatedFormat('d F, Y')}}</div>
            <div class="rate">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="like">
                    <i class="far fa-thumbs-up"></i>
                    <span>91</span>
                </div>
            </div>
        </div>
        <div class="another-reviews review-ambassador">
            <div class="review-content">
                <div class="img">
                    <img src="{{route('get.useravatar', $article->user->id)}}">
                </div>
                <div class="info">
                    <div class="inner">
                        <h5>{{$article->user->name}} {{$article->user->last_name}}</h5>
                        <span>{{$article->user->userData->direction}}</span>
                        <p>{{$article->user->userData->study}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-1">
            <div class="text">
                <div class="inner">
                    {{$article->title}}
                </div>
            </div>
            <div class="img">
                <img src="{{asset('images/card-reviews')}}/{{$article->image}}">
            </div>
        </div>
        <div class="info-2">
            <div class="img">
                <img src="{{asset('images/card-reviews')}}/{{$article->image2}}">
            </div>
            <div class="text">
                <div class="inner">
                    {{$article->description}}
                </div>
            </div>
        </div>
        <div class="info-3">
            {!! $article->text !!}
        </div>
    </div>
</div>

{!! $gallery !!}

{!! $video !!}
