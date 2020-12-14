<section>
    <div class="row align-items-center">
        <div class="col-6">
            <p>Заголовок:</p>
            <h2>{{$news->title}}</h2>
        </div>
        <div class="col-6">
            <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$news->image}}"/>
        </div>
    </div>
    <div class="row mt-2 align-items-center">
        <div class="col-8">
            <p>Описание:</p>
            <h5>{{$news->description}}</h5>
        </div>
    </div>

    <div class="row mt-2 align-items-center">
        <div class="col">
            <h5>Текст:</h5>
            <p class="font-medium-1">{!! $news->text !!}</p>
        </div>
    </div>

    <div class="mt-3">
        <form method="POST" action="{{route('admin.news.destroy', $news->id)}}">
            @csrf
            @method('DELETE')
        <a href="{{route('admin.news.index')}}" title="Список"
           class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light">
            <i class="feather icon-corner-up-left"></i> Список
        </a>
        <a href="{{route('admin.news.edit', $news->id)}}" title="Редактировать"
           class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light">
            <i class="feather icon-edit"></i> Редактировать
        </a>

            <button type="submit" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light">
                <i class="feather icon-trash-2"></i> Удалить
            </button>
        </form>
    </div>
</section>