<div class="main-links">
    <div class="container">
        <div class="links">
            <div class="burger">
                <span></span>
            </div>

            <div class="burger-menu">
                <ul>
                    @if (isset($burgers) && count($burgers) > 0)
                        @foreach($burgers as $burger)
                            <li>
                                <a href="@if (Route::has($burger->link)){{route($burger->link)}} @else {{$burger->link}} @endif">{{$burger->__('name')}}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <ul class="ul-main">
                @foreach($categories as $key => $category)
                    @if ($key == 3)
                        <li>
                            <div>
                                <a href="{{route('index')}}">
                                    @if (Route::currentRouteName()=='tourism.index')
                                        <img src="{{asset('images')}}/light-logo.png" alt="">
                                    @else
                                        <img src="{{asset('images')}}/logo.png" alt="">
                                    @endif
                                </a>
                            </div>
                        </li>
                    @endif
                    @if ($category->hasSub)
                        <li class="catalog-btn">
                            <div class="content">
                                {{$category->__('name')}}
                                <div class="cat-menu">
                                    @if ($category->id == 19)
                                        @foreach($countries as $country)

                                            <a href="{{route('country.show', $country->slug)}}">{{$country->name}}</a>
                                        @endforeach
                                        <span><a href="{{route('country.show',$country->slug )}}">@lang('main.all-countries')</a></span>
                                    @elseif ($category->id == 21)
                                        @foreach($programTypes as $programType)
                                            <a href="{{route('university.index')}}">{{$programType->__('name')}}</a>
                                        @endforeach
                                        <span><a href="{{route('university.index')}}">@lang('main.filter')</a></span>
                                    @else
                                        @set($s, $category->subcategory->count()-1)
                                        @foreach($category->subcategory as $n=>$sub)
                                            @if ($n==$s)
                                                <span><a href="@if(Route::has($sub->link)){{route($sub->link)}}@else{{$sub->link}}@endif">{{$sub->name}}</a></span>
                                            @else
                                                <a href="@if(Route::has($sub->link)){{route($sub->link)}}@else{{$sub->link}}@endif">{{$sub->name}}</a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </li>
                    @else
                        <li>
                            <div>
                                <a href="@if(Route::has($category->link)){{route($category->link)}}@else{{$category->link}}@endif">{{$category->__('name')}}</a>
                            </div>
                        </li>
                    @endif

                @endforeach
            </ul>

        </div>
    </div>
</div>