<div class="row match-height">
    @foreach($images as $image)
    <div class="col-xl-4 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-content">
                <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$image->path}}" alt="{{$image->alt}}">
                <div class="card-body">
                    <h5>{{$image->name}}</h5>
                    <p class="card-text">{{$image->alt}}</p>
                    <p>Ссылка: <br> <a href="{{asset($path)}}/{{$image->path}}"><span class="card-text">{{asset($path)}}/{{$image->path}}</span></a></p>
                    <div class="card-btns d-flex justify-content-between mt-2">
                        <form method="POST" action="{{route('admin.image.destroy', $image->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light">
                                <i class="feather icon-trash-2"></i> Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addImageForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<!-- Add Image Modal -->
<div class="modal fade text-left" id="addImageForm" tabindex="-1" role="dialog"
     aria-labelledby="addImageFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addAdvantageFormLabel">Добавление картинки</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.image.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <label>Название: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name">
                    </div>
                    <label>Alt: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="alt">
                    </div>
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
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
<!-- End Add Image Modal -->