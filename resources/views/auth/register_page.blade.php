<!DOCTYPE html>
<html lang="ru">
{!! $head !!}
<body>

<div class="authorization register">
    <div class="form-auth form-login row">
        <div class="content-form col-5">
            <a href="{{route('index')}}"><img class="logo" src="{{asset('images')}}/logo.png"></a>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2>@lang('auth.header.register')</h2>
                <div class="split-name">
                    <div class="inputs-form">
                        <label for="first-name">@lang('auth.register_page.name')</label>
                        <input id="first-name" type="text" name="name" class="@error('name') is-invalid @enderror " value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="inputs-form">
                        <label for="last-name">@lang('auth.register_page.surname')</label>
                        <input id="last-name" type="text" name="last_name" class="@error('last_name') is-invalid @enderror  value="{{ old('last_name') }}" required>
                    </div>
                </div>
                <div class="split-input">
                    <div class="inputs-form">
                        <i class="fas fa-user-graduate"></i>
                        <label for="name">@lang('auth.header.login')</label>
                        <input id="name" type="text" name="login" class="@error('login') is-invalid @enderror " value="{{ old('login') }}" required>
                    </div>
                    <div class="inputs-form">
                        <i class="fas fa-envelope"></i>
                        <label for="email">@lang('auth.register_page.e_mail')</label>
                        <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror " value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="inputs-form">
                    <i class="fas fa-unlock-alt"></i>
                    <label for="password">@lang('auth.register_page.password')</label>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror " name="password" required>
                </div>
                <div class="inputs-form last">
                    <i class="fas fa-unlock-alt"></i>
                    <label for="retry-password">@lang('auth.register_page.enter_password')</label>
                    <input id="retry-password" type="password" name="password_confirmation" required>
                </div>
                <div class="remember-me">
                    <div class="checkbox-form">
                        <label class="container-checkbox">
                            <input type="checkbox" id="myCheck">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <a href="#">@lang('auth.register_page.agreements')</a>
                </div>
                <button>@lang('auth.header.register')</button>
                <div class="login-with">
                    <span><a href="{{route('login')}}">@lang('auth.register_page.have_account')</a></span>
                </div>
            </form>
            <div class="link-bottom">
                @lang('auth.register_page.conditions') <a href="{{route('privacy')}}">@lang('auth.register_page.confidence')</a>
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
                <div class="slide-2">
                    <h2>@lang('auth.login_page.u_deserve_best')</h2>
                    <p>
                        @lang('auth.login_page.meet_schools')
                    </p>
                </div>
                <div class="slide-1">
                    <h2>@lang('auth.login_page.let_dreams')</h2>
                    <p>
                        @lang('auth.login_page.find_ur_school')
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
<script>
    document.getElementById("myCheck").required = true;
</script>

<script src="{{asset('js')}}/jquery-3.5.1.min.js"></script>
<script src="{{asset('js')}}/jquery-ui.min.js"></script>
<script src="{{asset('slick')}}/slick.min.js"></script>
<script src="{{asset('js')}}/bootstrap.min.js"></script>
<script src="{{asset('js')}}/main.js"></script>

</body>
</html>