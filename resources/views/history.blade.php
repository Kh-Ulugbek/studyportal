<div class="history">
    <div class="container">
        <div class="grid-history">
            <div class="parts">
                @foreach($history->icons as $icon)
                    <div>
                        <img src="{{asset('images/icons-parts')}}/{{$icon->image}}">
                        @if(\Illuminate\Support\Facades\Session::get('locale') == 'uz')
                            <p>
                                {{$icon->text_uz}}
                            </p>
                        @elseif(\Illuminate\Support\Facades\Session::get('locale') == 'en')
                            <p>
                                {{$icon->text_en}}
                            </p>
                        @else
                            <p>
                                {{$icon->text}}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="info">
                <div class="inner">
                    <h2>
                        {{$history->__('header')}}
                    </h2>
                    <p>
                        {{$history->__('paragraph')}}
                    </p>
                    <span>
						{{$history->__('span')}}
					</span>
                </div>
            </div>
        </div>
    </div>
</div>
