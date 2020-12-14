<header @if (Route::currentRouteName()=='tourism.index')class="dark-theme-header"@endif>
    <div class="soc-n-contacts">
        <form class="search-field" method="post" action="{{route('search')}}">
            @csrf
            <input type="search" placeholder="Поиск..." name="needle" minlength="4">
            <div class="close-search"></div>
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <div class="inner">
            <div class="menu-mob"></div>
            <div class="social">
                @foreach($social_icons as $social)
                    <a href="{{$social->link}}" target="_blank">
                        <img src="{{asset('images')}}/{{$social->image}}" alt="{{$social->name}}"
                             title="{{$social->name}}">
                    </a>
                @endforeach
            </div>
            <div class="contacts">
                <div class="phones">
                    <span><a href="tel:{{$company->phone1}}">{{$company->phone1}}</a></span>
                    <span><a href="tel:{{$company->phone2}}">{{$company->phone2}}</a></span>
                </div>
                <div class="btn-callback">
                    <button>
                        <i class="fas fa-phone-alt"></i>
                        @lang('auth.header.call_back')
                    </button>
                </div>
                <div class="btn-lang">
                    <button >
                        <a style="color: #2C63B4;" class="text-decoration-none"
                           href="{{ route('locale', 'ru') }}">
                            <i class="fas fa-globe"></i>
                            ru
                        </a>
                    </button>
                    <button >
                        <a style="color: #2C63B4;" class="text-decoration-none"
                           href="{{ route('locale', 'en') }}">
                            <i class="fas fa-globe"></i>
                            en
                        </a>
                    </button>
                    <button >
                        <a style="color: #2C63B4;" class="text-decoration-none"
                           href="{{ route('locale', 'uz') }}">
                            <i class="fas fa-globe"></i>
                            uz
                        </a>
                    </button>

                </div>
                <div class="links">
                    @if (Auth::check())
                        <a href="{{route('user.show', Auth::user()->id)}}">
                            <img src="{{asset('images')}}/student.png">
                        </a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            @lang('auth.header.logout')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}">@lang('auth.header.login')</a>
                        <a href="{{ route('register') }}">@lang('auth.header.register')</a>
                    @endif
                    <img src="{{asset('images')}}/search.png" class="search-btn">
                </div>
            </div>
        </div>
    </div>

    @yield('menu')
</header>