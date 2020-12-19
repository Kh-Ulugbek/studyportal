<!DOCTYPE html>
<html lang="ru">
{!! $head !!}
<body>

<div class="authorization">
    <div class="form-auth form-login row">
        <div class="content-form col-5">
            <a href="{{route('index')}}"><img class="logo" src="images/logo.png"></a>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2>@lang('auth.login_page.personal_cabinet')</h2>
                <div class="inputs-form">
                    <i class="fas fa-user-graduate"></i>
                    <label for="name">@lang('auth.login')</label>
                    <input id="name" type="text" class="@error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>
                </div>
                <div class="inputs-form last">
                    <i class="fas fa-unlock-alt"></i>
                    <label for="password">@lang('auth.register_page.password')</label>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="remember-me">
                    <div class="checkbox-form">
                        <label class="container-checkbox">@lang('auth.login_page.remember_me')
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">@lang('auth.login_page.forgot_password')</a>
                    @endif
                </div>
                <button>@lang('auth.login_page.enter')</button>
                <div class="login-with">
                    <span>@lang('auth.login_page.login_with')</span>
                    <a href="#">
                        <img src="images/facebook.png">
                    </a>
                    <a href="#">
                        <img src="images/google.png">
                    </a>
                </div>
            </form>
            <div class="link-bottom">
                @lang('auth.login_page.no_account') <a href="{{ route('register') }}">@lang('auth.header.register')</a>
            </div>
        </div>
        <div class="content-form col-7">
            <div class="controllers-reviews-b">
                <div class="left">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="right">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <div class="slider-form">
                <div class="slide-1">
                    <h2>@lang('auth.login_page.let_dreams')</h2>
                    <p>
                        @lang('auth.login_page.find_ur_school')
                    </p>
                </div>
                <div class="slide-2">
                    <h2>@lang('auth.login_page.u_deserve_best')</h2>
                    <p>
                        @lang('auth.login_page.meet_schools')
                    </p>
                </div>
                <div class="slide-3">
                    <h2>@lang('auth.login_page.enroll_to_university')</h2>
                    <p>
                        @lang('auth.login_page.communicate_students')
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js')}}/jquery-3.5.1.min.js"></script>
<script src="{{asset('js')}}/jquery-ui.min.js"></script>
<script src="{{asset('slick')}}/slick.min.js"></script>
<script src="{{asset('js')}}/bootstrap.min.js"></script>
<script src="{{asset('js')}}/main.js"></script>

</body>
</html>