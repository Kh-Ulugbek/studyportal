<div class="select-country">
    <div class="container">
        <div class="head">
            <div>
                <h2>
                    @lang('main.country_show.study_foreign')
                </h2>
            </div>
            <div>
                <h6>
                    @lang('main.country_show.find_ur_dream')
                </h6>
                <p>
                    @lang('main.country_show.which_to_chose')
                </p>
            </div>
        </div>
    </div>
    <div id="tabs-countries">
        <div class="content">
            <div class="countries">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('country.show', $country->slug)}}">
                            <img src="{{asset($path)}}/{{$country->image}}">
                            <p>{{$country->__('name')}}</p>
                        </a>
                    </li>
                    @foreach($others as $other)
                    <li>
                        <a href="{{route('country.show', $other->slug)}}">
                            <img src="{{asset($path)}}/{{$other->image}}">
                            <p>{{$other->__('name')}}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="info">
                <div id="tabs-1">
                    <img src="{{asset($path)}}/info/{{$country->info->image}}">
                    <h4>{{$country->info->__('title')}}</h4>
                    <p class="desc">
                        {{$country->info->__('description')}}
                    </p>
                    <h5>@lang('main.country_show.questions')</h5>
                    <div class="accordion-faq" id="accordion-faq-c">
                        @foreach($country->faqs as $countryFaq)
                        <h3>
                            {{$countryFaq->question}}
                            <div class="arrow"></div>
                        </h3>
                        <div>
                            @foreach($countryFaq->answers as $answer)
                            <p>
                                {{$answer->answer}}
                            </p>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{!! $country_world !!}
