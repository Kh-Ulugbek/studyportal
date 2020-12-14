<div class="photo-gallery">
    <div class="slider-gallery">
        @set($i, count($gallery))
        @for($n = 0; $n < $i; $n++)
            <div>
                <div class="grid row">
                    <div class="col-12 col-first" style="background: url({{asset('/images/gallery')}}/{{$gallery[$n]->image}});">
                        <p class="info">
                            {{$gallery[$n]->text}}
                        </p>
                        <span>{{$gallery[$n]->name}}</span>
                        <div class="open">
                            <a href="{{$gallery[$n]->link}}">@lang('main.gallery.open')</a>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>