<div class="online-library-sec">
    <div class="container">
        <h2>@lang('main.online_lib.online_lib')</h2>
    </div>
    <div class="grid">
        <div class="img-f">
            <img src="{{asset($path)}}/book.png">
        </div>
        <div class="info">
            <div class="inner">
                <h5>@lang('main.online_lib.welcome_to_lib')</h5>
                <ul>
                    <li>
                        @lang('main.online_lib.any_kind')
                    </li>
                    <li>
                        @lang('main.online_lib.new_books')
                    </li>
                    <li>
                        @lang('main.online_lib.bestsellers')
                    </li>
                </ul>
                <a href="{{route('library.index')}}">@lang('main.online_lib.to_lib')</a>
            </div>
        </div>
        <div class="img-s">
            <img src="{{asset($path)}}/bill.png">
        </div>
    </div>
</div>