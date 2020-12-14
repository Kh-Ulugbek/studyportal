<div class="row align-items-center">
    <div class="col-12">
        <div class="card">
            <form method="POST" action="{{route('admin.news.update',$news->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="card-content p-1">
                    <div class="row">
                        <div class="col">
                            <p class="text-bold-600">Заголовок:</p>
                            <div class="form-group">
                                <textarea class="form-control" name="title" id="title" rows="3"
                                          title="title">{{$news->title}}</textarea>
                                <small class="text-muted">Не более 255 символов</small>
                            </div>
                            <p class="text-bold-600">Заголовок(en):</p>
                            <div class="form-group">
                                <textarea class="form-control" name="title_en" id="title" rows="3"
                                          title="title">{{$news->title_en}}</textarea>
                                <small class="text-muted">Не более 255 символов</small>
                            </div>
                            <p class="text-bold-600">Заголовок(uz):</p>
                            <div class="form-group">
                                <textarea class="form-control" name="title_uz" id="title" rows="3"
                                          title="title">{{$news->title_uz}}</textarea>
                                <small class="text-muted">Не более 255 символов</small>
                            </div>
                            <p class="text-bold-600">Описание:</p>
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description" rows="4"
                                          title="description">{{$news->description}}</textarea>
                                <small class="text-muted">Не более 255 символов</small>
                            </div>
                            <p class="text-bold-600">Описание(en):</p>
                            <div class="form-group">
                                <textarea class="form-control" name="description_en" id="description" rows="4"
                                          title="description">{{$news->description_en}}</textarea>
                                <small class="text-muted">Не более 255 символов</small>
                            </div>
                            <p class="text-bold-600">Описание(uz):</p>
                            <div class="form-group">
                                <textarea class="form-control" name="description_uz" id="description" rows="4"
                                          title="description">{{$news->description_uz}}</textarea>
                                <small class="text-muted">Не более 255 символов</small>
                            </div>
                        </div>
                        <div class="col">
                            <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$news->image}}"/>
                            <p class="text-bold-600 mt-1">Картинка: </p>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                            </div>
                        </div>
                    </div>
                    <p class="text-bold-600">Текст:</p>
                    <div class="form-group">
                        <textarea class="form-control" name="text" id="newstext" rows="20"
                                  title="text">{!! $news->text !!}</textarea>
                    </div>
                    <p class="text-bold-600">Текст(en):</p>
                    <div class="form-group">
                        <textarea class="form-control" name="text_en" id="newstext_en" rows="10" title="text">{!! $news->text_en !!}</textarea>
                    </div>
                    <p class="text-bold-600">Текст(uz):</p>
                    <div class="form-group">
                        <textarea class="form-control" name="text_uz" id="newstext_uz" rows="10" title="text">{!! $news->text_uz !!}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-icon btn-primary"><i class="feather icon-save"></i>
                            Сохранить
                        </button>
                        <a href="{{route('admin.news.index')}}" title="Список"
                           class="btn btn-icon ml-2 btn-warning waves-effect waves-light">
                            <i class="feather icon-corner-up-left"></i> Список
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('newstext', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
    CKEDITOR.replace('newstext_en', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
    CKEDITOR.replace('newstext_uz', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
</script>