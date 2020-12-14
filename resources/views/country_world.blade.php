<div class="about-world selected-world mt-0" style="background: url({{asset('images/banners')}}/{{$section->image}});">
    <div class="container">
        <div class="grid">
            <div class="title">
                <h5>
                    {{$section->title}}
                </h5>
            </div>
            <div class="text">
                <p>
                    {!! $section->text !!}
                </p>
                <a href="#">@lang('main.get_consultation')</a>
            </div>
        </div>
    </div>
</div>