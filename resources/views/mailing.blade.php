<div class="mailing">
    <div class="container">
        <div class="content">
            <div class="text">
                <h3>@lang('main.mailing.subscribe_for_news')</h3>
                <p>
                    @lang('main.mailing.leave_email')
                </p>
            </div>
            <div class="form">
                <form action="{{route('subscribe')}}" id="subscribe-form" method="post">
                    @csrf
                    <div class="inputs">
                        <div>
                            <input type="email" name="subscribe" placeholder="@lang('auth.register_page.e_mail')" required>
                        </div>
                        <div>
                            <button type="submit">
                                @lang('main.mailing.subscribe')
                            </button>
                        </div>
                    </div>
                    <label>
                        @lang('main.mailing.subscribe_for_news')
                    </label>
                </form>
                <div id="success" class="alert alert-success d-none" role="alert"></div>
                <div id="error" class="alert alert-danger d-none" role="alert"></div>
            </div>
        </div>
    </div>
</div>
