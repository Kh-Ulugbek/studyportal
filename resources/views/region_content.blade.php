<div class="content-region-info">
    <div class="row">
        <div class="col-6">
            <h2>{{$region->__('title')}}</h2>
            <p>
                {{$region->__('description')}}
            </p>
            <div class="cards">
                @foreach($others as $key=>$other)
                <div>
                    <a href="{{route('tourism.region', $other->slug)}}">
                        <img src="{{asset($path)}}/{{ ($key%3 == 0)?'uzor-s.png':(($key%3 == 1)?'uzor-x.png':(($key%3 == 2)?'uzor-a.png':''))}}">
                        <span>{{$other->__('name')}}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-6">
            <div class="controllers">
                <div class="arrows">
                    <div class="left">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="right">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div class="slider-regions">
                @foreach($region->places as $place)
                <div class="slide-reg">
                    <div class="img">
                        <div>
                            <img src="{{asset($path)}}/{{$place->image1}}">
                        </div>
                        <div>
                            <img src="{{asset($path)}}/{{$place->image2}}">
                        </div>
                    </div>
                    <div class="info">
                        <h4>{{$place->name}}</h4>
                        <p>
                            {{$place->description}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
