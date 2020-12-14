<div class="row match-height">
    @foreach($images as $image)
        <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <a href="#" title="Изменить" data-id="{{$image->id}}" data-toggle="modal" data-target="#changeImageForm">
                        <img class="card-img-top img-fluid" src="{{asset($image->folder)}}/{{$image->image}}">
                    </a>
                    <div class="card-body">
                        <a href="#" data-id="{{$image->id}}" data-toggle="modal" data-target="#changeImageForm">
                            <h5 class="text-info">{{$image->alt_name}}</h5>
                        </a>
                        <h4 class="image-title">{{$image->title}}</h4>
                        <p class="image-text">{{$image->text}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


<!-- changeBanner Modal -->
<div class="modal fade text-left" id="changeImageForm" tabindex="-1" role="dialog"
     aria-labelledby="changeImageFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="changeImageFormLabel">Изменить картинку</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <img class="card-img img-fluid" src="{{asset($image->folder)}}/{{$image->image}}">
            <form method="POST" action="{{route('admin.banner.change', $image->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="image">Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control"  id="image" name="image" accept="image/*">
                    </div>
                    <label for="title">Заголовок: </label>
                    <div class="form-group">
                        <input type="text" class="form-control"  id="title" name="title">
                    </div>

                    <label for="text">Текст: </label>
                    <div class="form-group">
                        <textarea class="form-control"  name="text" id="text" rows="4"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End changeBanner Modal -->