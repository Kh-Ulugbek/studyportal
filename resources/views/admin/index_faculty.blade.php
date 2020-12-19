<div class="row match-height">
@foreach($faculties as $faculty)
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card">
            <div class="card-content">
                <img id="faculty-image-{{$faculty->id}}" class="card-img-top img-fluid" src="{{asset($path)}}/{{$faculty->image}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p class="card-text bg-warning" style="max-width: 60px; padding: 5px;">
                                <img id="faculty-icon-{{$faculty->id}}" class="card-img-top img-fluid" src="{{asset($path)}}/icons/{{$faculty->icon}}">
                            </p>
                        </div>
                        <div class="col-8">
                            <h6>{{$faculty->name}}</h6>
                            <h5 hidden>{{$faculty->name_en}}</h5>
                            <h4 hidden>{{$faculty->name_uz}}</h4>
                            <div class="card-btns d-flex">
                                <button title="Редактировать" type="button" data-id="{{$faculty->id}}" class="btn btn-icon btn-primary  mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#editFacultyForm">
                                    <i class="feather icon-edit"></i>
                                </button>
                            <form action="{{route('admin.faculties.destroy', $faculty->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button title="Удалить" type="submit" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </form>

                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
</div>

{{$faculties->links()}}

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addFacultyForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<!-- Add Faculty Modal -->
<div class="modal fade text-left" id="addFacultyForm" tabindex="-1" role="dialog"
     aria-labelledby="addFacultyFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addFacultyFormLabel">Добавление факультета</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.faculties.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <label>Иконка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="icon" accept="image/*">
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
<!-- End Add Faculty Modal -->

<!-- Edit Faculty Modal -->
<div class="modal fade text-left" id="editFacultyForm" tabindex="-1" role="dialog"
     aria-labelledby="editFacultyFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editFacultyFormLabel">Редактирование факультета</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.faculties.update', $faculty->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <img id="modal-faculty-image" class="card-img-top img-fluid" src="{{asset($path)}}/{{$faculty->image}}">
                        </div>
                        <div class="col-3 bg-warning m-1 p-1">
                            <img id="modal-faculty-icon" class="card-img img-fluid" src="{{asset($path)}}/icons/{{$faculty->icon}}">
                        </div>
                    </div>
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <label>Иконка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="icon" accept="image/*">
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
<!-- End Edit Faculty Modal -->