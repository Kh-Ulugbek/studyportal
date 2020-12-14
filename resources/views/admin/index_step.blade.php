<div class="row match-height">
    @foreach($steps as $step)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card border-info text-center bg-transparent">
                <div class="card-content">
                    <div class="card-title" style="height: 80px;">
                        <img id="step-image" src="{{asset($path)}}/{{$step->image}}" class="mt-2">
                    </div>
                    <div class="card-body">
                        <h4 id="step-title"  class="card-title text-uppercase"> {{$step->title}}</h4>
                        <h4 hidden id="step-title_en"  class="card-title text-uppercase"> {{$step->title_en}}</h4>
                        <h4 hidden id="step-title_uz"  class="card-title text-uppercase"> {{$step->title_uz}}</h4>
                        <p id="step-text" class="card-text text-left mb-25"> {{$step->text}}</p>
                        <p hidden id="step-text_en" class="card-text text-left mb-25"> {{$step->text_en}}</p>
                        <p hidden id="step-text_uz" class="card-text text-left mb-25"> {{$step->text_uz}}</p>
                    </div>
                    <div class="card-body text-left">
                        <button title="Редактировать" data-id="{{$step->id}}" type="button" class="btn btn-icon btn-primary mt-1 waves-effect waves-dark" data-toggle="modal" data-target="#editStepForm">
                            <i class="feather icon-edit"></i>
                        </button>

                        <button form="step-destroy-{{$step->id}}" title="Удалить" type="submit" class="btn btn-icon btn-danger mt-1 waves-effect waves-dark">
                            <i class="feather icon-trash-2"></i>
                        </button>
                        <form id="step-destroy-{{$step->id}}" action="{{route('admin.step.destroy', $step->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addStepForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<!-- Edit Step Modal -->
<div class="modal fade text-left" id="editStepForm" tabindex="-1" role="dialog" aria-labelledby="editStepFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editStepFormLabel">Редактирование шага</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{route('admin.step.update',$step->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <label>Заголовок(ru): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" value="{{$step->title}}">
                    </div>
                    <label>Заголовок(en): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title_en" value="{{$step->title_en}}">
                    </div>
                    <label>Заголовок(uz): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title_uz" value="{{$step->title_uz}}">
                    </div>

                    <label>Картинка: </label>
                    <img style="max-width: 100px;" class="mb-1" src="{{asset($path)}}/{{$step->image}}">
                    <div class="form-group">
                        <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                    </div>

                    <label>Текст(ru): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text" id="text" rows="5">{{$step->text}}</textarea>
                    </div>
                    <label>Текст(en): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text_en" id="text_en" rows="5">{{$step->text_en}}</textarea>
                    </div>
                    <label>Текст(uz): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text_uz" id="text_uz" rows="5">{{$step->text_uz}}</textarea>
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

<!-- Add Step Modal -->
<div class="modal fade text-left" id="addStepForm" tabindex="-1" role="dialog" aria-labelledby="addStepFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addStepFormLabel">Добавление шага</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{route('admin.step.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <label>Заголовок(ru): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <label>Заголовок(en): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title_en" >
                    </div>
                    <label>Заголовок(uz): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title_uz" >
                    </div>

                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
                    </div>

                    <label>Текст(ru): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text" id="text" rows="5" required></textarea>
                    </div>
                    <label>Текст(en): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text_en" id="text_en" rows="5" ></textarea>
                    </div>
                    <label>Текст(uz): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="text_uz" id="text_uz" rows="5" ></textarea>
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