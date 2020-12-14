

<div class="contacts-page">
    <div class="container">
        <div class="content">
            <div class="text">
                <div class="cont">
                    <img src="images/location-b.png">
                    <div>
                        <h5>@lang('main.contact_content.our_address')</h5>
                        <p>
                            {{$company->address}}
                        </p>
                    </div>
                </div>
                <div class="cont">
                    <img src="images/clock.png">
                    <div>
                        <h5>@lang('main.contact_content.our_work_time')</h5>
                        <p>
                            {{$company->working}}
                        </p>
                    </div>
                </div>
                <div class="cont-db">
                    <div class="inner">
                        <img src="images/phone-b.png">
                        <div>
                            <h5>@lang('main.contact_content.our_contacts')</h5>
                            <p class="numbers">
                                <span>{{$company->phone1}}</span>
                                <span>{{$company->phone2}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="inner">
                        <img src="images/mail.png">
                        <div>
                            <h5>@lang('main.contact_content.our_email')</h5>
                            <p>
                                {{$company->email}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form">
                <form id="message-form" method="post" action="{{route('message')}}">
                    @csrf
                    <div class="inner">
                        <h3>@lang('main.contact_content.leave_message')</h3>
                        <div class="inputs-form">
                            <i class="fas fa-user"></i>
                            <label for="name">@lang('auth.register_page.name')</label>
                            <input id="name" type="text" name="name" required>
                        </div>
                        <div class="inputs-form">
                            <i class="fas fa-envelope"></i>
                            <label for="email">@lang('auth.register_page.e_mail')</label>
                            <input id="email" type="email" name="email">
                        </div>
                        <div class="inputs-form phone-reverse">
                            <i class="fas fa-phone"></i>
                            <label for="phone">@lang('main.phone')</label>
                            <input id="phone" type="text" name="phone">
                        </div>
                        <div class="inputs-form last">
                            <i class="fas fa-comment"></i>
                            <label for="text">@lang('main.ur_message')</label>
                            <input id="text" type="text" name="text">
                        </div>
                        <button type="submit">@lang('main.send')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>