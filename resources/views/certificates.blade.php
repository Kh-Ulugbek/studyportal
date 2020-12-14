<div class="certificates">
    <div class="container">
        <h2>@lang('main.certificates.our_certificates')</h2>
        <div class="slider-certificates">
            @foreach($certificates as $certificate)
            <div>
                <div class="item">
                    <img src="{{asset('images/certificates')}}/{{$certificate->image}}" alt="{{$certificate->name}}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>