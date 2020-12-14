<section>
    <div class="row align-items-center">
        <div class="col-6">
            <p>Заголовок:</p>
            <h2>{{$article->title}}</h2>
            <p class="card-text mt-2"><i class="feather icon-user"></i> {{$article->user->name}} {{$article->user->last_name}}</p>
            <p class="text-muted"><i class="feather icon-calendar"></i> {{$article->created_at->format("H:i d/m/Y")}}</p>
            <form action="{{route('admin.article.published', $article->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <select class="form-control" name="published">
                        <option value="0" {{(!$article->published)?'selected':''}}>Скрыт</option>
                        <option value="1" {{($article->published)?'selected':''}}>Опубликован</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-icon btn-success mr-1 mb-1 waves-effect waves-light">
                    Сохранить
                </button>
            </form>
        </div>
        <div class="col-6">
            <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$article->image}}"/>
        </div>
    </div>
    <div class="row mt-2 align-items-center">
        <div class="col-8">
            <p>Описание:</p>
            <h5>{{$article->description}}</h5>
        </div>
    </div>

    <div class="row mt-2 align-items-center">
        <div class="col">
            <h5>Текст:</h5>
            <p class="font-medium-1">{!! $article->text !!}</p>
        </div>
    </div>

    <div class="mt-3">
        <form method="POST" action="{{route('admin.article.destroy', $article->id)}}">
            @csrf
            @method('DELETE')
            <a href="{{route('admin.article.index')}}" title="Список"
               class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light">
                <i class="feather icon-corner-up-left"></i> Список
            </a>
            <a href="{{route('admin.article.edit', $article->id)}}" title="Редактировать"
               class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light">
                <i class="feather icon-edit"></i> Редактировать
            </a>

            <button type="submit" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light">
                <i class="feather icon-trash-2"></i> Удалить
            </button>
        </form>
    </div>
</section>