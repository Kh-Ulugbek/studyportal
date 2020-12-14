<div class="steps">
    <div class="container">
        <div class="steps-content">
            @set($cnt, $steps->count())
            @foreach($steps as $num => $step)
                @if ($num==0)
                    <div class="item flag">
                        @elseif($num == $cnt-1)
                            <div class="item">
                                @else
                                    <div class="item flag punk-left punk-right">
                                        @endif
                                        <div class="decor-top"></div>
                                        <div class="number-count">{{$num+1}}</div>
                                        <img src="{{asset('images/icons-steps')}}/{{$step->image}}">
                                        <h4>{{$step->__('title')}}</h4>
                                        <p>{{$step->__('text')}}</p>
                                    </div>
                                    @endforeach
                            </div>
                    </div>
        </div>