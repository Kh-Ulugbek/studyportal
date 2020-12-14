<div class="photo-gallery">
    <h2 class="wow animate__slideInLeft" data-wow-duration="1500ms">@lang('main.gallery.reviews')</h2>
    <div class="slider-gallery wow animate__slideInUp" data-wow-duration="1500ms">
        @set($i, count($gallery))
        @for($n = 0; $n < $i; $n++)
            <div>
                <div class="grid row">
                    <div class="col-12 col-first" style="background: url({{asset('/images/gallery')}}/{{$gallery[$n]->image}});">
                        <p class="info">
                            {{$gallery[$n]->__('text')}}
                        </p>
                        <span>{{$gallery[$n]->__('name')}}</span>
                        <div class="open">
                            <a href="{{$gallery[$n]->link}}">@lang('main.gallery.open')</a>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>