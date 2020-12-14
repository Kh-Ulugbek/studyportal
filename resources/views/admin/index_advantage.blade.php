<div class="row match-height">
    @foreach($advantages as $advantage)
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="card-img img-fluid" src="{{asset($path)}}/{{$advantage->image}}">
                            </div>
                            <div class="col-md-6">
                                <p id="advantage-text" class="card-text  mb-0">{{$advantage->text}}
                                <p hidden id="advantage-text_en" class="card-text  mb-0">{{$advantage->text_en}}
                                <p hidden id="advantage-text_uz" class="card-text  mb-0">{{$advantage->text_uz}}
                            </div>
                        </div>
                        <div class="card-btns mt-2">
                            <button title="Редактировать" data-id="{{$advantage->id}}" type="button"
                                    class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light"
                                    data-toggle="modal" data-target="#editAdvantageForm">
                                <i class="feather icon-edit"></i>
                            </button>
                            <button title="Удалить" data-id="{{$advantage->id}}" type="button"
                                    class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light"
                                    data-toggle="modal" data-target="#deleteAdvantageForm">
                                <i class="feather icon-trash-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addAdvantageForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>


<!-- Edit Advantage Modal -->
<div class="modal fade text-left" id="editAdvantageForm" tabindex="-1" role="dialog"
     aria-labelledby="editAdvantageFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editAdvantageFormLabel">Редактирование преимущества</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.advantage.update',$advantage->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <div class="col-md-6 m-auto">
                        <img class="card-img-top img-fluid" src=""/>
                    </div>
                    <label>Текст(ru): </label>
                    <div class="form-group">
                        <textarea name="text" id="advantageText" class="form-control"
                                  rows="3">{!! $advantage->text !!}</textarea>
                    </div>
                    <label>Текст(en): </label>
                    <div class="form-group">
                        <textarea name="text_en" id="advantageText_en" class="form-control"
                                  rows="3">{!! $advantage->text_en !!}</textarea>
                    </div>
                    <label>Текст(uz): </label>
                    <div class="form-group">
                        <textarea name="text_uz" id="advantageText_uz" class="form-control"
                                  rows="3">{!! $advantage->text_uz !!}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
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
<!-- End Edit Advantage Modal -->


<!-- Add Advantage Modal -->
<div class="modal fade text-left" id="addAdvantageForm" tabindex="-1" role="dialog"
     aria-labelledby="addAdvantageFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addAdvantageFormLabel">Добавление преимущества</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.advantage.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <label>Текст(ru): </label>
                    <div class="form-group">
                        <textarea name="text" id="advantageText" class="form-control"
                                  rows="3"></textarea>
                    </div>
                    <label>Текст(en): </label>
                    <div class="form-group">
                        <textarea name="text_en" id="advantageText_en" class="form-control"
                                  rows="3"></textarea>
                    </div>
                    <label>Текст(uz): </label>
                    <div class="form-group">
                        <textarea name="text_uz" id="advantageText_uz" class="form-control"
                                  rows="3"></textarea>
                    </div>
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
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
<!-- End Add Advantage Modal -->

<!-- Delete Advantage Modal -->
<div class="modal fade text-left" id="deleteAdvantageForm" tabindex="-1" role="dialog" aria-labelledby="deleteAdvantageFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteAdvantageFormLabel">Удаление преимущества</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить преимущество: <br><span class="text-bold-700">преимущество</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.advantage.destroy',$advantage->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>