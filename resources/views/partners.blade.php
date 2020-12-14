@if ($partners->count()>0)
    <div class="r-partners">
        <div class="container">
            <h2>@lang('main.partners.our_partners')</h2>
            <div class='partners'>
                @for($y=0; ($y<$partners->count()&& $y<2); $y++)
                    <div class="item">
                        <div class="head">
                            <div class="img">
                                <img src="{{asset('images/partners/list')}}/{{$partners[$y]->logo}}">
                            </div>
                            <div class="info">
                                <div class="inner">
                                    <h5>
                                        {{$partners[$y]->__('name')}}
                                    </h5>
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{$partners[$y]->__('city')}}, {{$partners[$y]->country->name}}
                                    </div>
                                    <a class="link" href="{{route('university.show', $partners[$y]->id)}}"
                                       target="_blank">@lang('main.partners.more_info')</a>
                                </div>
                            </div>
                        </div>
                        <img class="img" src="{{asset('images/partners')}}/{{$partners[$y]->image}}">
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endif
@if ($partners->count()>2)
    <div class="list-partners">
        <div class="container">
            <div class="list">
                @for($z=2; $z<$partners->count(); $z++)
                    <div>
                        <a href="{{$partners[$z]->link}}">
                            <img src="{{asset('images/partners/list')}}/{{$partners[$z]->logo}}">
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endif