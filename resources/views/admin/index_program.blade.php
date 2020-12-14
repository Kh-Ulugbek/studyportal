<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Программы</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="callbacks-table" class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Наименование</th>
                                <th scope="col">Направление</th>
                                <th scope="col">Университет</th>
                                <th scope="col">Факультет</th>
                                <th scope="col">Продолжительность</th>
                                <th scope="col">Цена, $/год</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($programs as $key=>$program)
                                <tr data-id="{{$program->id}}">
                                    <th scope="row">{{$key+1}}</th>
                                    <td id="program-name{{$program->id}}"> {{$program->name}}</td>
                                    <td> {{$program->type->name}}</td>
                                    <td> {{$program->university->name}}</td>
                                    <td> {{$program->faculty->name}}</td>
                                    <td> {{$program->duration->name}}</td>
                                    <td> {{$program->cost}}</td>
                                    <td>
                                        <button title="Удалить" data-id="{{$program->id}}" type="button" class="btn btn-sm btn-icon btn-danger waves-effect waves-light" data-toggle="modal" data-target="#deleteProgramForm">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table head options end -->

{{$programs->links()}}

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addProgramForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<!-- Add Type Modal -->
<div class="modal fade text-left" id="addProgramForm" tabindex="-1" role="dialog"
     aria-labelledby="addProgramFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addProgramFormLabel">Добавление программы</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.programs.store')}}">
                @csrf
                <div class="modal-body">
                    <label>Название: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <label for="type">Тип: </label>
                    <div class="form-group">
                        <select name="type" id="type" class="form-control" required>
                            <option value="" disabled selected>Не выбрано</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="university">Университет: </label>
                    <div class="form-group">
                        <select name="university" data-getFaculties="{{route('university.faculties',0)}}" id="university" class="form-control" required>
                            <option value="" disabled selected>Не выбрано</option>
                            @foreach($universities as $university)
                                <option value="{{$university->id}}">{{$university->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="faculty">Факультет: </label>
                    <div class="form-group">
                        <select name="faculty" id="faculty" class="form-control" required>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="duration">Продолжительность: </label>
                            <div class="form-group">
                                <select name="duration" id="duration" class="form-control" required>
                                    <option value="" disabled selected>Не выбрано</option>
                                    @foreach($durations as $duration)
                                        <option value="{{$duration->id}}">{{$duration->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for="cost">Цена: </label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="cost" min="0" value="0">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
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


<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteProgramForm" tabindex="-1" role="dialog" aria-labelledby="deleteProgramFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteProgramFormLabel">Удаление программы</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить программу <hr>
                    <span class="text-bold-700"></span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.programs.destroy',0)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>