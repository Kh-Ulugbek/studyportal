<div class="profile filters">
    <div id="tabs-profile">
        <div class="grid-profile row">
            <div class="list col-3">
                <h2>@lang('main.university_content.filter_for') <br> @lang('main.university_content.choosing_program')
                </h2>
                <ul>
                    <li>
                        <span class="burger"></span>
                        <a href="#tabs-1">
                            @lang('main.university_content.all_universities')
                        </a>
                    </li>
                    <li class="tabs-countries">
                        <a href="#tabs-2">
                            <div class="count">
                                1
                            </div>
                            @lang('main.university_content.country')
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-3">
                            <div class="count">
                                2
                            </div>
                            @lang('main.university_content.program')
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-4">
                            <div class="count count-4">
                                3
                            </div>
                            @lang('main.university_content.faculty')
                        </a>
                    </li>
                    <!--<li class="last-double">-->
                    <!--    <a href="#tabs-5">-->
                    <!--        <div class="count">-->
                    <!--            4-->
                    <!--        </div>-->
                    <!--        <div class="count last">-->
                    <!--            5-->
                    <!--        </div>-->
                    <!--        <p class="first">Стоимость</p>-->
                    <!--        <p class="last-p">Продолжительность</p>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="btn-show-res">
                        <a href="#tabs-6" class="show-result">
                            @lang('main.university_content.show_all_results')
                        </a>
                        <button type="submit" class="d-none submit-btn"></button>
                    </li>
                    @foreach($universities as $university)
                        <li class="hide-li-universe">
                            <a href="#tabs-{{$university->id + 7}}">
                                @lang('main.university_content.university')
                            </a>
                        </li>
                    @endforeach
                    <li class="clear-filters">
                        <div>
                            @lang('main.university_content.clear')
                        </div>
                    </li>
                </ul>
            </div>
            <div class="content col-9">
                <div id="tabs-1">
                    <div class="content-bookmarks">
                        <div class="r-partners">
                            <div class="partners">
                                @foreach($universities as $university)
                                    <div class="item">
                                        @auth
                                            <i data-route="{{route('add.bookmark', $university->id)}}"
                                               class="fas fa-bookmark"></i>
                                        @endauth
                                        <div class="head">
                                            <div class="img">
                                                <img src="{{asset($path)}}/list/{{$university->logo}}">
                                            </div>
                                            <div class="info">
                                                <h5>
                                                    {{$university->__('name')}}
                                                </h5>
                                                <div class="location">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    {{$university->__('city')}}, {{$university->country->name}}
                                                </div>
                                                <a class="link" href="#"
                                                   data-tabs="tabs-{{$university->id + 7}}">@lang('main.partners.more_info')</a>
                                            </div>
                                        </div>
                                        <img class="img" src="{{asset($path)}}/{{$university->image}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-2">
                    <div class="heading">
                        <h3>
                            @lang('main.university_content.if_u_think')
                        </h3>
                        <div class="showAll">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div id="selectAllC">
                                <img src="{{asset('images')}}/heart.png">
                                @lang('main.all-countries')
                            </div>
                        </div>
                    </div>
                    <div class="content-countries countries">
                        <div class="content">
                            <div class="inner">
                                @foreach($countries as $country)
                                    <div class="item">
                                        <div class="checked"></div>
                                        <img src="{{asset($cpath)}}/{{$country->image}}">
                                        <p>{{$country->__('name')}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <a id="countries-filter" href="#/" class="next-button">
                            @lang('main.university_content.next')
                        </a>
                    </div>
                </div>
                <div id="tabs-3">
                    <div class="heading">
                        <h3>
                            @lang('main.university_content.if_u_think')
                        </h3>
                    </div>
                    <div class="content-countries content-programms">
                        <div class="content-first">
                            @foreach($programTypes as $programType)
                                <div style="background: url({{asset('/images/programms/')}}/{{$programType->image}});"
                                     name="prog">
                                    <button>{{$programType->name}}</button>
                                </div>
                            @endforeach
                        </div>
                        <div class="btns-prev-next">
                            <a href="#/" class="back-button">@lang('main.university_content.back')</a>
                            <a href="#/" class="next-button">@lang('main.university_content.next')</a>
                        </div>
                    </div>
                </div>
                <div id="tabs-4">
                    <div class="heading">
                        <h3>
                            @lang('main.university_content.if_u_think')
                        </h3>
                    </div>
                    <div class="content-faculty">
                        <div class="content-fac">
                            @foreach($faculties as $faculty)
                                <div class="item"
                                     style="background: url({{asset('/images/filters/')}}/{{$faculty->image}});">
                                    <img src="{{asset('/images/filters/icons')}}//{{$faculty->icon}}">
                                    <p>{{$faculty->name}}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="btns-prev-next">
                            <a href="#/" class="back-button">@lang('main.university_content.back')</a>
                            <a href="#/" class="next-button">@lang('main.university_content.next')</a>
                        </div>
                    </div>
                </div>
                <!--<div id="tabs-5">-->
                <!--    <div class="heading">-->
                <!--        <h3>-->
                <!--            Если вы думаете об образовании за границей, сайт Studyportal поможет вам разобраться в сложностях выбора иностранного  университета и процессе поступления.-->
                <!--        </h3>-->
                <!--    </div>-->
                <!--    <div class="content-price-n-duration">-->
                <!--        <div class="price">-->
                <!--            <div>-->
                <!--                <p>Бесплатно</p>-->
                <!--            </div>-->
                <!--            <div>-->
                <!--                <p>0-500 $/год</p>-->
                <!--            </div>-->
                <!--            <div>-->
                <!--                <p>500-5000 $/год</p>-->
                <!--            </div>-->
                <!--            <div>-->
                <!--                <p>5000-10000 $/год</p>-->
                <!--            </div>-->
                <!--            <div>-->
                <!--                <p>10000-25000 $/год</p>-->
                <!--            </div>-->
                <!--            <div>-->
                <!--                <p>Больше 25000 $/год</p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <h3 class="title-duration">Продолжительность</h3>-->
                <!--        <div class="duration">-->
            <!--            @foreach($durations as $duration)-->
                <!--            <div name="dur">-->
            <!--                <p>{{$duration->name}}</p>-->
                <!--            </div>-->
                <!--            @endforeach-->
                <!--        </div>-->
                <!--        <div class="btns-prev-next">-->
                <!--            <a hred="#/" class="back-button">Назад</a>-->
                <!--            <a hred="#/" class="next-button">Далее</a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div id="tabs-6">
                    <div class="heading">
                        <h3>
                            @lang('main.filter_result.results') (6)
                        </h3>
                    </div>
                    <div class="content-bookmarks">
                        <div class="r-partners">
                            <div class="partners">
                                <div class="item">
                                    <i class="fas fa-bookmark"></i>
                                    <div class="head">
                                        <div class="img">
                                            <img src="images/partners/1.png">
                                        </div>
                                        <div class="info">
                                            <h5>
                                                @lang('main.university_content.agro_university')
                                            </h5>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                @lang('main.university_content.Prague')
                                                , @lang('main.university_content.Czech')
                                            </div>
                                            <a class="link" href="#">@lang('main.partners.more_info')</a>
                                        </div>
                                    </div>
                                    <img class="img" src="images/partners/img-1.png">
                                </div>
                                <div class="item">
                                    <i class="fas fa-bookmark"></i>
                                    <div class="head">
                                        <div class="img">
                                            <img src="images/partners/2.png">
                                        </div>
                                        <div class="info">
                                            <h5>
                                                @lang('main.university_content.university_Suriya')
                                            </h5>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                @lang('main.university_content.Gilford_England')
                                            </div>
                                            <a class="link" href="#">@lang('main.partners.more_info')</a>
                                        </div>
                                    </div>
                                    <img class="img" src="images/partners/img-2.png">
                                </div>
                                <div class="item">
                                    <i class="fas fa-bookmark"></i>
                                    <div class="head">
                                        <div class="img">
                                            <img src="images/partners/list/1.png">
                                        </div>
                                        <div class="info">
                                            <h5>
                                                @lang('main.university_content.some_filial')
                                            </h5>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                @lang('main.university_content.moscow_filial')
                                            </div>
                                            <a class="link" href="#">@lang('main.partners.more_info')</a>
                                        </div>
                                    </div>
                                    <img class="img" src="images/partners/img-3.png">
                                </div>
                                <div class="item">
                                    <i class="fas fa-bookmark"></i>
                                    <div class="head">
                                        <div class="img">
                                            <img src="images/partners/list/2.png">
                                        </div>
                                        <div class="info">
                                            <h5>
                                                @lang('main.university_content.Columbia_university')
                                            </h5>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                @lang('main.university_content.Usa')
                                            </div>
                                            <a class="link" href="#">@lang('main.partners.more_info')</a>
                                        </div>
                                    </div>
                                    <img class="img" src="images/partners/img-4.png">
                                </div>
                                <div class="item">
                                    <i class="fas fa-bookmark"></i>
                                    <div class="head">
                                        <div class="img">
                                            <img src="images/partners/1.png">
                                        </div>
                                        <div class="info">
                                            <h5>
                                                @lang('main.university_content.agar_czech')
                                            </h5>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                Прага, Чехия
                                            </div>
                                            <a class="link" href="#">@lang('main.partners.more_info')</a>
                                        </div>
                                    </div>
                                    <img class="img" src="images/partners/img-1.png">
                                </div>
                                <div class="item">
                                    <i class="fas fa-bookmark"></i>
                                    <div class="head">
                                        <div class="img">
                                            <img src="images/partners/2.png">
                                        </div>
                                        <div class="info">
                                            <h5>
                                                @lang('main.university_content.university_Suriya')
                                            </h5>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                @lang('main.university_content.Gilford_England')
                                            </div>
                                            <a class="link" href="#">@lang('main.partners.more_info')</a>
                                        </div>
                                    </div>
                                    <img class="img" src="images/partners/img-2.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($universities as $university)
                    <div id="tabs-{{$university->id + 7}}">
                        <div class="head-universe" style="background: url({{asset($path)}}/{{$university->image}})">
                            <h3>{{$university->__('name')}}</h3>
                        </div>
                        <div class="content-universe-page">
                            <div class="info-grid">
                                <div class="img">
                                    @auth
                                        <div class="addToFavorites">
                                            @lang('main.university_content.to_bookmarks') <i
                                                    data-route="{{route('add.bookmark', $university->id)}}"
                                                    class="fas fa-bookmark"></i>
                                        </div>
                                    @endauth
                                    <img src="{{asset($path)}}/list/{{$university->logo}}">
                                </div>
                                <div class="text">
                                    <p><span>@lang('main.city'): </span>{{$university->__('city')}}
                                        , {{$university->country->name}}</p>
                                    <p><span>@lang('main.profile_show.title'): </span>{{$university->__('name')}}</p>
                                    @if(!empty($university->__('type')))
                                        <p>
                                            <span>@lang('main.university_content.kind_university'): </span>{{$university->__('type')}}
                                        </p>
                                    @endif
                                    <p><span>@lang('main.university_content.count_of'): </span>{{$university->__('students')}}
                                    </p>
                                    <p><span>@lang('main.university_content.official_site'): </span><a
                                                href="{{$university->link}}">{{$university->link}}</a></p>
                                </div>
                            </div>
                            <h5>{{$university->__('title')}}</h5>
                            <p class="description">
                                {!! $university->__('description') !!}
                            </p>
                            @if ($university->images->count() > 0)
                                <div class="gallery-ph">
                                    @foreach($university->images as $uimage)
                                        <div>
                                            <img src="{{asset('images')}}/universe-page/{{$uimage->path}}">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="payment_cards pay_in_filter">
                                <div class="card_item card_paypal">
                                    <img src="{{asset('images')}}/paypal.png">
                                </div>
                                <div class="card_item last card_payme">
                                    <img src="{{asset('images')}}/payme.png">
                                </div>
                                <button>@lang('main.university_content.reg_for_cons')</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<form action="{{route('filter.result')}}" id="getResultsForm" method="post">
    @csrf
</form>
