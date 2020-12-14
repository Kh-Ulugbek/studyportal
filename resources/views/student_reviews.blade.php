<div class="studentsReview">
    <div class="content">
        <h2>@lang('main.student_reviews.students_reviews')</h2>
        <div class="review">
            <div class="sidebar">
                <div class="inner">
                    <div class="head">
                        <h4>@lang('main.student_reviews.video_review')</h4>
                        <p>@lang('main.student_reviews.our_students')</p>
                    </div>
                    <div class="contentCountry">
                        <a class="allCountry" href="{{route('video.byCountry')}}">
                            @lang('main.all-countries')
                        </a>
                        <ul>
                            @foreach($countries as $country)
                                <li>
                                    <a href="{{route('video.byCountry', $country->slug)}}">
                                        <img src="{{asset('images/country')}}/{{$country->image}}">
                                        {{$country->__('name')}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <a class="moreStudents" href="#">
                            @lang('main.student_reviews.more_students')
                            <img src="images/refresh.png">
                        </a>
                    </div>
                </div>
                <button class="select-prog">
                    <a href="{{route('university.index')}}">@lang('main.student_reviews.chose_program')</a>
                </button>
            </div>

            <div class="reviews" id="reviewItems">
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
                                <img class="poster"
                                     src="{{asset('images/video-reviews')}}/{{$review->image->videobg}} ">
                                <img class="play" src="{{asset('images')}}/play.png">
                            </div>
                            <div class="photos">
                                <div class="photos-1"
                                     style="background: url({{asset('/images/video-reviews')}}/{{$review->image->photo1}});">
                                    <span>@lang('main.student_reviews.video_report')</span>
                                </div>
                                <div class="photos-2 treg"
                                     style="background: url({{asset('/images/video-reviews')}}/{{$review->image->photo2}});"></div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>