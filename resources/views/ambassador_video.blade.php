<div class="video-ambassador">
    <div class="content">
        <h2>{{$review->title}}</h2>
        <div class="inner">
            <div class="video">
                <div class="inf-n-video">
                    <div class="bg-black"></div>
                    <video class="img-thumbnail" src="{{route('get.video', $review->id)}}" preload="metadata" type="video/{{explode(".", strtolower($review->video))[1]}}" controls></video>
                    <div class="info-student">
                        <h4>{{$review->user->name}} {{$review->user->last_name}}</h4>
                        <span>{{$review->user->userData->study}}</span>
                        <div class="type">
                            {{$review->created_at->translatedFormat('j F Y')}}
                        </div>
                    </div>
                    <img class="poster" src="{{asset('images/video-reviews')}}/{{$review->image->videobg}}">
                    <img class="play" src="{{asset('images')}}/play.png">
                </div>
            </div>
            <div class="text">
                <div class="text-content">
                    <h5>
                        {{$review->title}}
                    </h5>
                    <p>
                        {{$review->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>