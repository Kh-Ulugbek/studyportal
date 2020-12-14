<div class="online-labrary">
    <div class="container">
        <h2>
            @lang('main.library_content.downloading_data')
        </h2>
        <div class="books">
            @foreach($books as $book)
            <div class="item">
                <div class="img">
                    <img src="{{asset($path)}}/{{$book->image}}">
                </div>
                <div class="info">
                    <h6 class="white-blue-ball">
                        {{$book->__('name')}}
                    </h6>
                    <div class="data">
                        <span>@lang('main.library_content.download_date')</span>
                        <p>{{$book->created_at->format('d.m.Y')}}</p>
                        <a href="{{route('getBook', $book->file_name)}}" target="_blank"><img src="images/download.png"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <button class="showMore">
        @lang('main.library_content.show_more')
    </button>
</div>