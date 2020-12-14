<div class="row match-height">
    @foreach($news as $new)
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <a href="{{route('admin.news.show', $new->id)}}" title="Посмотреть">
                        <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$new->image}}"/>
                    </a>
                    <div class="card-body">
                        <h4 class="card-title" id="new-title">{{$new->__('title')}}</h4>
                        <p class="card-text">{{$new->__('description')}}</p>
                        <p class="card-text">
                            <small class="text-muted">{{$new->created_at->format("H:i d/m/Y")}}</small>
                        </p>
                        <div class="card-btns d-flex">
                            <a title="Редактировать" href="{{route('admin.news.edit', $new->id)}}"
                               class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light">
                                <i class="feather icon-edit"></i>
                            </a>
                            <a title="Удалить" href="{{route('admin.news.destroy', $new->id)}}" data-id="{{$new->id}}"
                               class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light"
                               data-toggle="modal" data-target="#deleteNewForm">
                                <i class="feather icon-trash-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteNewForm" tabindex="-1" role="dialog"
     aria-labelledby="deleteNewFormFormLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteNewFormFormLabel1">Удаление новости</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить новость <br>
                    <span class="text-bold-700">Новость</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.news.destroy',$new->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>