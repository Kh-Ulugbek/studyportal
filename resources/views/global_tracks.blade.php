<div class="globalTrack wow animate__slideInLeft" data-wow-duration="1500ms">
    <div class="info">
        <h2>{{$global_track->__('title')}}</h2>
        <p>{{$global_track->__('text')}}</p>
        <div class="cards">
            <div class="item in">
                <img src="{{asset('images')}}/{{$global_track->ico1}}">
                <span class="numbers">{{$global_track->num1}}+</span>
                <p>{{$global_track->__('subt1')}}</p>
            </div>
            <div class="item in">
                <img src="{{asset('images')}}/{{$global_track->ico2}}">
                <span class="numbers">{{$global_track->num2}}+</span>
                <p>{{$global_track->__('subt2')}}</p>
            </div>
        </div>
    </div>
    <div class="map-container earth">
        <img class="world" src="images/earth.svg">
        <div data-toggle="tooltip" data-placement="bottom" class="point usa tippy" title="Соединенные Штаты Америки"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point usa-2 tippy" title="Соединенные Штаты Америки"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point usa-3 tippy" title="Соединенные Штаты Америки"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point malay tippy" title="Малайзия"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point gbr tippy" title="Великобритания"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point france tippy" title="Франция"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point poland tippy" title="Польша"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point germany tippy" title="Германия"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point spain tippy" title="Испания"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point italy tippy" title="Италия"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point czech tippy" title="Чехия"></div>
        <div data-toggle="tooltip" data-placement="bottom" class="point turkey tippy" title="Туркия"></div>
    </div>    
</div>