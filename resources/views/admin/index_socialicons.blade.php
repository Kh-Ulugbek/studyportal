<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Мы в социальных сетях</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-sm table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Картинка</th>
                                <th scope="col">Ссылка</th>
                                <th class="text-center" colspan="2" scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($social_icons as $key => $icon)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td id="icon-name">{{$icon->name}}</td>
                                <td id="icon-image">
                                    <img style="max-width: 45px;" class="bg-secondary" src="{{asset('images')}}/{{$icon->image}}" alt="{{$icon->name}}"
                                         title="{{$icon->name}}">
                                </td>
                                <td id="icon-link"class="col-md-3 font-small-3">{{$icon->link}}</td>
                                <td>
                                    <button title="Редактировать" data-id="{{$icon->id}}" type="button" class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#editIconForm">
                                        <i class="feather icon-edit"></i>
                                    </button>
                                </td>
                                <td>
                                    <button title="Удалить" data-id="{{$icon->id}}" type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#deleteIconForm">
                                        <i class="feather icon-trash-2"></i>
                                    </button>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addIconForm">
                        <i class="feather icon-plus-square"></i> Добавить
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table head options end -->

<!-- Edit Icon Modal -->
<div class="modal fade text-left" id="editIconForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Редактирование иконки</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.social-icons.update',$icon->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <label>Имя: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Имя" class="form-control" name="name" value="{{$icon->name}}">
                    </div>

                    <label>Ссылка: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Ссылка" class="form-control" name="link" value="{{$icon->link}}">
                    </div>
                    <label>Картинка: </label><img style="max-width: 75px;" class="bg-secondary" src="{{asset('images')}}/{{$icon->image}}">

                    <div class="form-group">
                        <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
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

<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteIconForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Удаление иконки</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить иконку <span class="text-bold-700">Facebook</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.social-icons.destroy',$icon->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Icon Modal -->
<div class="modal fade text-left" id="addIconForm" tabindex="-1" role="dialog" aria-labelledby="addIconForm1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addIconForm1">Добавление новой иконки</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.social-icons.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Имя: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Имя" class="form-control" name="name">
                    </div>

                    <label>Ссылка: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Ссылка" class="form-control" name="link">
                    </div>
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
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