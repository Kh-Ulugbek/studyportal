<div class="info-regions">
    <div class="first">
        <div class="content">
            <div class="text">
                <img src="{{asset('images')}}/tatar.png" class="uzor">
                <div class="inner">
                    <h6>
                    {{$section->__('title')}}
                    </h6>
                    <p>
                        {{$section->__('intro')}}
                    </p>
                </div>
            </div>
            <div class="img">
                <img src="{{asset('images/regions')}}/{{$section->image}}">
            </div>
        </div>
    </div>
    <div class="second">
        <div class="info">
            <div class="bg"></div>
            <p>
                {{$section->__('description')}}
            </p>
            <p>
                {{$section->__('text')}}
            </p>
        </div>
    </div>
</div>