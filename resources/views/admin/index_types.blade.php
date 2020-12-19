<div class="row match-height">
    @foreach($types as $type)
        <div class="col-xl-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <img id="type-image-{{$type->id}}" class="card-img-top img-fluid" src="{{asset($path)}}/{{$type->image}}">
                    <div class="card-body">
                                <h6>{{$type->name}}</h6>
                                <h5 hidden>{{$type->name_en}}</h5>
                                <h4 hidden>{{$type->name_uz}}</h4>
                                <div class="card-btns d-flex">
                                    <button title="Редактировать" type="button" data-id="{{$type->id}}" class="btn btn-icon btn-primary  mr-1 waves-effect waves-light" data-toggle="modal" data-target="#editTypeForm">
                                        <i class="feather icon-edit"></i>
                                    </button>
                                    <form action="{{route('admin.program.types.destroy', $type->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button title="Удалить" type="submit" class="btn btn-icon btn-danger mr-1 waves-effect waves-light">
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

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addTypeForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<!-- Add Type Modal -->
<div class="modal fade text-left" id="addTypeForm" tabindex="-1" role="dialog"
     aria-labelledby="addTypeFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addTypeFormLabel">Добавление направления</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.program.types.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <label>Название(ru): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <label>Название(en): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_en">
                    </div>
                    <label>Название(uz): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_uz">
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
<!-- End Add Type Modal -->

<!-- Edit Type Modal -->
<div class="modal fade text-left" id="editTypeForm" tabindex="-1" role="dialog"
     aria-labelledby="editTypeFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editTypeFormLabel">Редактирование направления</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.program.types.update', $type->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <img id="modal-type-image" class="card-img-top img-fluid" src="{{asset($path)}}/{{$type->image}}">
                        </div>

                    </div>
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <label>Наименование(ru): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required value="{{ $type->name }}">
                    </div>
                    <label>Наименование(en): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_en" value="{{ $type->name_en }}">
                    </div>
                    <label>Наименование(uz): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_uz" value="{{ $type->name_uz }}">
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
<!-- End Edit Type Modal -->