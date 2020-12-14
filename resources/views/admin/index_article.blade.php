<div class="row match-height">
    @foreach($articles as $article)
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <a href="{{route('admin.article.show', $article->id)}}" title="Посмотреть">
                        <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$article->image}}"/>
                    </a>
                    <div class="card-body">
                        <p class="card-text"><i class="feather icon-user"></i> {{$article->user->name}} {{$article->user->last_name}}</p>
                        <p class="card-text">
                            <small class="text-muted">{{$article->created_at->format("H:i d/m/Y")}}</small>
                        </p>
                        @if ($article->published)
                            <h5 class="card-text text-info"><i class="feather icon-eye"></i> Опубликован</h5>
                        @else
                            <h5 class="card-text text-warning"><i class="feather icon-eye-off"></i> Скрыт</h5>
                        @endif

                        <h4 class="card-title" id="article-title">{{$article->title}}</h4>
                        <p class="card-text">{{$article->description}}</p>

                        <div class="card-btns d-flex">
                            <a title="Редактировать" href="{{route('admin.article.edit', $article->id)}}" class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light">
                                <i class="feather icon-edit"></i>
                            </a>
                            <a title="Удалить" href="{{route('admin.article.destroy', $article->id)}}" data-id="{{$article->id}}" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light"
                               data-toggle="modal" data-target="#deleteArticleForm">
                                <i class="feather icon-trash-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{$articles->links()}}
<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteArticleForm" tabindex="-1" role="dialog" aria-labelledby="deleteArticleFormLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteNewFormFormLabel1">Удаление поста</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить пост <br>
                    <span class="text-bold-700"></span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.article.destroy',$article->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>