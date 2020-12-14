@if($reviews->count() > 0)
    @foreach($reviews as $key => $review)
        <div class="item {{($key%2!=0)?'right-items':''}}">
            <div class="inf-n-video">
                <div class="bg-black"></div>
                <video controls="controls">
                    <source src="{{route('get.video', $review->id)}}"
                            type="video/{{explode(".", strtolower($review->video))[1]}}">
                </video>
                <div class="info-student">
                    <h4>{{$review->user->name}}</h4>
                    <span>{{$review->user->userData->from}}, {{$review->user->userData->country->name}}</span>
                    <div class="type">
                        {{$review->user->userData->position}}
                    </div>
                </div>
                <img class="poster" src="{{asset('images/video-reviews')}}/{{$review->image->videobg}} ">
                <img class="play" src="{{asset('images')}}/play.png">
            </div>
            <div class="photos">
                <div class="photos-1" style="background: url({{asset('/images/video-reviews')}}/{{$review->image->photo1}});">
                    <span>@lang('main.videos_from')</span>
                </div>
                <div class="photos-2 treg" style="background: url({{asset('/images/video-reviews')}}/{{$review->image->photo2}});"></div>
            </div>
        </div>
    @endforeach
@endif