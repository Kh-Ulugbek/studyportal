<div class="row match-height">
    @foreach($reviews as $review)
<div class="col-xl-4 col-md-6 col-sm-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title">{{$review->title}}</h4>
            </div>
            <div class="embed-responsive embed-responsive-item embed-responsive-16by9">
                <video class="img-thumbnail" src="{{route('get.video', $review->id)}}" preload="metadata" type="video/{{explode(".", strtolower($review->video))[1]}}" controls></video>
            </div>
            <div class="card-body">
                <p class="card-text">{{$review->user->name}} {{$review->user->last_name}}</p>
                <p class="card-text">{{$review->description}}</p>
                <p class="card-text text-secondary">{{$review->created_at->translatedFormat('j F h:i A')}}</p>
                <div class="card-btns d-flex justify-content-end">
                    <form action="{{route('admin.review.destroy', $review->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button title="Удалить" type="submit" class="btn btn-icon btn-danger mr-1 waves-effect waves-light">
                            <i class="feather icon-trash-2"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
    @endforeach
</div>