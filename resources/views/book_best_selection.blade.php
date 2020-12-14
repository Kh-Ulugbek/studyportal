<div class="best-selection">
    <div class="container">
        <h2>@lang('main.the_bests')</h2>
        <div class="slider-books-review">
            @foreach($books as $key => $book)

                @if ($key%3 == 0) <div class="review"> @endif

                    @if ($key%3 == 0)
                        <div class="small-card bg-yellow">
                            <img src="{{asset($path)}}/{{$book->image}}">
                            <h6>{{$book->__('author')}}</h6>
                            <p>"{{$book->__('name')}}"</p>
                        </div>
                    @elseif($key%3==1)

                        <div class="small-card bg-darkBlue">
                            <img src="{{asset($path)}}/{{$book->image}}">
                            <h6>{{$book->__('author')}}</h6>
                            <p>"{{$book->__('name')}}"</p>
                        </div>
                    @elseif($key%3==2)

                        <div class="big-card bg-grey">
                            <div class="info">
                                <div class="img">
                                    <img src="{{asset($path)}}/{{$book->image}}">
                                </div>
                                <div class="text">
                                    <h5>
                                        {{$book->__('publishing_house')}}
                                    </h5>
                                    <p>
                                        {{$book->__('description')}}
                                    </p>
                                </div>
                            </div>
                            <div class="links-n-controllers">
                                <a href="{{route('getBook', $book->file_name)}}">@lang('main.gallery.open')</a>
                                <span>{{$book->file_type}}: {{$book->size}} @lang('main.mb')</span>
                                <div class="controllers-reviews-b">
                                    <div class="left">
                                        <i class="fas fa-chevron-left"></i>
                                    </div>
                                    <div class="right">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($key%3 == 2) </div> @endif

            @endforeach

        </div>
    </div>
</div>