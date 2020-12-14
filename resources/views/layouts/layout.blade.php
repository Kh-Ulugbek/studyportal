<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('head')
<body>

<div class="callback-m">
    <div class="inner">
        <div class="close-c"></div>
        <img class="callback-dec" src="{{asset('images')}}/callback-dec.png">
        <img src="{{asset('images')}}/callback-dec-o.png" class="callback-dec-o">
        <img class="logo" src="{{asset('images')}}/logo.png">
        <h2>
            @lang('main.callback-form')
        </h2>
        <form id="callback-form" method="post" action="{{route('callback')}}">
            @csrf
            <input type="text" name="name" placeholder="@lang('auth.register_page.name')" required>
            <input type="email" name="email" placeholder="@lang('auth.register_page.e_mail')" required>
            <input type="text" name="city" placeholder="@lang('main.city')" required>
            <input type="text" name="phone" placeholder="@lang('main.phone')" required>
            <input type="text" name="message" placeholder="@lang('main.ur_message')" required>
            <button>@lang('main.send')</button>
        </form>
    </div>
</div>
@yield('mob_menu')
@include('header')

@yield('content')

@yield('mailing')

@yield('footer')

<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('slick/slick.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/myscript.js')}}"></script>

<!-- Success Modal -->
<div class="modal" id="SuccessModal" tabindex="-1" role="dialog" aria-labelledby="SuccessModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center text-success p-4">
            <h3 class="p-1"><i class="fa fa-check-circle fa-2x"></i></h3>
            <h4></h4>
        </div>
    </div>
</div>

<!-- Alert Modal -->
<div class="modal" id="AlertModal" tabindex="-1" role="dialog" aria-labelledby="AlertModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center text-danger p-4">
            <h3 class="p-1"><i class="fa fa-times fa-2x"></i></h3>
            <h4></h4>
        </div>
    </div>
</div>

<div class="covid">
    <a href="http://new.studyportal.uz/public/news/10"><span>@lang('main.covid_19')</span> @lang('main.updates')</a>
</div>
</body>
</html>