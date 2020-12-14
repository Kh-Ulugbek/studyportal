<div class="about-university">
    <div class="head-universe" style="background: url({{asset('images/partners')}}/{{$university->image}})">
        <h3>{{$university->name}}</h3>
    </div>
    <div class="content-universe-page">
        <div class="info-grid">
            <div class="img">
                <div class="addToFavorites">
                    @lang('main.university_content.to_bookmarks') <i class="fas fa-bookmark"></i>
                </div>
                <img src="{{asset('images/partners')}}/list/{{$university->logo}}">
            </div>
            <div class="text">
                <p><span>@lang('main.university_content.country'): </span>{{$university->city}}
                    , {{$university->country->name}}</p>
                <p><span>@lang('main.profile_show.title'): </span>{{$university->name}}</p>
                <p><span>@lang('main.university_content.kind_university'): </span>{{$university->type}}</p>
                <p><span>@lang('main.university_content.count_of'): </span>{{$university->students}}</p>
                <p><span>@lang('main.university_content.official_site'): </span><a
                            href="{{$university->link}}">{{$university->link}}</a></p>
            </div>
        </div>
        <h5>{{$university->title}}</h5>
        <p class="description">
            {!! $university->description !!}
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