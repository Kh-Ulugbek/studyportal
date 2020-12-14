<div class="books-compare">
    <div class="content">
        <div class="img">
            <img src="{{asset($path)}}/{{$compare[0]->image}}">
        </div>
        <div class="text">
            <h4>{{$compare[0]->__('name')}}</h4>
            <p>
                {{$compare[0]->__('description')}}
            </p>
            <div class="stat">
                <a href="{{route('getBook', $compare[0]->file_name)}}">@lang('main.look_through')</a>
                <span>{{$compare[0]->file_type}}: {{$compare[0]->size}} @lang('main.mb')</span>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="img">
            <img src="{{asset($path)}}/{{$compare[1]->image}}">
        </div>
        <div class="text">
            <h4>{{$compare[1]->__('name')}}</h4>
            <p>
                {{$compare[1]->__('description')}}
            </p>
            <div class="stat">
                <a href="{{route('getBook', $compare[1]->file_name)}}">@lang('main.look_through')</a>
                <span>{{$compare[1]->file_type}}: {{$compare[1]->size}} @lang('main.mb')</span>
            </div>
        </div>
    </div>
</div>