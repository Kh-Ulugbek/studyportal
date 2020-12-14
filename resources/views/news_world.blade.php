<div class="about-world news-world mt-0" style="background: url({{asset('images/banners')}}/{{$section->image}});">
    <div class="container">
        <div class="grid">
            <div class="title">
                <h5>
                    {{$section->__('title')}}
                </h5>
            </div>
            <div class="text">
                <p>
                    {!! $section->__('text') !!}
                </p>
                <a href="#">@lang('main.get_consultation')</a>
            </div>
        </div>
    </div>
</div>