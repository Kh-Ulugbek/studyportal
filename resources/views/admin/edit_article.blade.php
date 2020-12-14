<div class="row align-items-center">
    <div class="col-12">
        <div class="card">
            <form method="POST" action="{{route('admin.article.update',$article->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-content p-1">
                    <div class="row">
                        <div class="col">
                            <p class="text-bold-600">Заголовок:</p>
                            <div class="form-group">
                                <textarea class="form-control" name="title" id="title" rows="3" title="title">{{$article->title}}</textarea>
                                <small class="text-muted">Не более 255 символов</small>
                            </div>
                            <p class="text-bold-600">Описание:</p>
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description" rows="4" title="description">{{$article->description}}</textarea>
                                <small class="text-muted">Не более 255 символов</small>
                            </div>
                        </div>
                        <div class="col">
                            <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$article->image}}"/>
                            <p class="text-bold-600 mt-1">Картинка: </p>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                            </div>
                        </div>
                    </div>
                    <p class="text-bold-600">Текст:</p>
                    <div class="form-group">
                        <textarea class="form-control" name="text" id="articletext" rows="20" title="text">{!! $article->text !!}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-icon btn-primary"><i class="feather icon-save"></i> Сохранить</button>
                        <a href="{{route('admin.article.index')}}" title="Список" class="btn btn-icon ml-2 btn-warning waves-effect waves-light">
                            <i class="feather icon-corner-up-left"></i> Список
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('articletext', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
</script>