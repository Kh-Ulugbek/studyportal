<!-- Card Captions and Overlay section start -->
<section id="card-caps">
    <div class="row my-3">
        @foreach($galleries as $gallery)
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$gallery->image}}"/>
                        <div class="card-body">
                            <h4 id="gallery-name" class="card-title">{{$gallery->name}}</h4>
                            <h4 hidden id="gallery-name_en" class="card-title">{{$gallery->name_en}}</h4>
                            <h4 hidden id="gallery-name_uz" class="card-title">{{$gallery->name_uz}}</h4>
                            <p id="gallery-text" class="card-text">{!! $gallery->text !!}</p>
                            <p hidden id="gallery-text_en" class="card-text_en">{!! $gallery->text_en !!}</p>
                            <p hidden id="gallery-text_uz" class="card-text_uz">{!! $gallery->text_uz !!}</p>
                            <p class="card-text">
                                <a id="gallery-link" href="{{$gallery->link}}"
                                   class="btn btn-outline-warning waves-effect waves-light">Ссылка</a>
                                {{$gallery->link}}
                            </p>
                            <div class="card-btns d-flex">
                                <button title="Редактировать" data-id="{{$gallery->id}}" type="button"
                                        class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light"
                                        data-toggle="modal" data-target="#editGalleryForm">
                                    <i class="feather icon-edit"></i>
                                </button>
                                <form action="{{route('admin.gallery.destroy', $gallery->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Удалить" type="submit"
                                            class="btn btn-icon btn-danger mr-1 waves-effect waves-light">
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
    <button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light"
            data-toggle="modal" data-target="#addGalleryForm">
        <i class="feather icon-plus-square"></i> Добавить
    </button>
</section>
<!-- Card Captions and Overlay section end -->

<!-- Edit editGalleryForm Modal -->
<div class="modal fade text-left" id="editGalleryForm" tabindex="-1" role="dialog"
     aria-labelledby="editGalleryFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editGalleryFormLabel">Редактирование</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.gallery.update',$gallery->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <img class="card-img-top img-fluid w-75" src=""/>
                <div class="modal-body">
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                    </div>

                    <label>Имя(ru): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Имя" class="form-control" name="name"
                               value="{{$gallery->name}}" required>
                    </div>
                    <label>Имя(en): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Имя" class="form-control" name="name_en"
                               value="{{$gallery->name_en}}">
                    </div>
                    <label>Имя(uz): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Имя" class="form-control" name="name_uz"
                               value="{{$gallery->name_uz}}">
                    </div>

                    <label>Заголовок(ru): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text" placeholder="Заголовок"
                                  rows="4">{{$gallery->text}}</textarea>
                    </div>
                    <label>Заголовок(en): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text_en" placeholder="Заголовок"
                                  rows="4">{{$gallery->text_en}}</textarea>
                    </div>
                    <label>Заголовок(uz): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text_uz" placeholder="Заголовок"
                                  rows="4">{{$gallery->text_uz}}</textarea>
                    </div>

                    <label>Ссылка: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Ссылка" class="form-control" name="link"
                               value="{{$gallery->link}}">
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
<!-- End editGalleryForm Modal -->


<!-- Add GalleryForm Modal -->
<div class="modal fade text-left" id="addGalleryForm" tabindex="-1" role="dialog" aria-labelledby="addGalleryFormLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addGalleryFormLabel">Добавление</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.gallery.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>

                    <label>Имя(ru): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Имя" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                    <label>Имя(en): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Имя" class="form-control" name="name_en"
                               value="{{old('name_en')}}">
                    </div>
                    <label>Имя(uz): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Имя" class="form-control" name="name_uz"
                               value="{{old('name_uz')}}">
                    </div>

                    <label>Заголовок(ru): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text" placeholder="Заголовок"
                                  rows="4">{{old('text')}}</textarea>
                    </div>
                    <label>Заголовок(en): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text_en" placeholder="Заголовок"
                                  rows="4">{{old('text_en')}}</textarea>
                    </div>
                    <label>Заголовок(uz): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text_uz" placeholder="Заголовок"
                                  rows="4">{{old('text_uz')}}</textarea>
                    </div>

                    <label>Ссылка: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Ссылка" class="form-control" name="link"
                               value="{{old('link')}}">
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
<!-- End Add GalleryForm Modal -->
