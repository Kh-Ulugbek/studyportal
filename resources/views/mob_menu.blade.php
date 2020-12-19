<div class="links-mob">
    <div class="close-m"></div>
    <a href="{{route('index')}}">
        <img class="logo" src="{{asset('images/logo.png')}}">
    </a>
    <ul>
{{--        @dd($mob_menu_items)--}}
        @if (isset($mob_menu_items) && count($mob_menu_items) > 0)
            @foreach($mob_menu_items as $mob_menu_item)
        <li>
            <a href="@if (Route::has($mob_menu_item->link)) {{route($mob_menu_item->link)}} @else {{$mob_menu_item->link}} @endif">{{$mob_menu_item->name}}</a>
        </li>
            @endforeach
        @endif
        <li>
            <a href="{{ route('login') }}">@lang('auth.logout')</a>
        </li>
        @if (Route::has('register'))
        <li>
            <a href="{{ route('register') }}">@lang('auth.register')</a>
        </li>
        @endif
    </ul>
</div>