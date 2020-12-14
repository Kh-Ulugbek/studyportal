<div class="row my-3 match-height">
    <div class="col-xl-8 col-md-8 col-sm-8">

        <div class="card">
            <img style="max-height: 130px;" class="card-img-top img-fluid" src="{{asset($path)}}/{{$partner->image}}"
                 alt="{{$partner->name}}"/>
            <div class="card-content">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img style="max-height: 120px;" class="card-img-top img-fluid"
                                 src="{{asset($path)}}/list/{{$partner->logo}}"
                                 alt="{{$partner->name}}"/>
                        </div>
                        <div class="col-md-7">
                            <h4 id="partner-name" class="card-title">{{$partner->name}}</h4>
                            <p>{{$partner->city}}, {{$partner->country->name}}</p>
                        </div>
                    </div>
                    <div class="card-text mt-2">
                        <ul class="list-group">
                            @foreach($partner->faculties as $faculty)
                                <li class="list-group-item d-flex justify-content-between">{{$faculty->name}}
                                    <form method="POST" action="{{route('admin.partner.faculty.detach', $partner->id)}}">
                                        @csrf
                                        <input type="hidden" name="faculty_id" value="{{$faculty->id}}">
                                        <button title="Удалить" type="submit"
                                                class="btn btn-sm btn-icon btn-danger waves-effect waves-light">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <button type="button" class="btn  btn-icon btn-success waves-effect waves-light" data-toggle="modal" data-target="#addFacultyForm">
            <i class="feather icon-plus-square"></i> Добавить
        </button>

        <a href="{{route('admin.partner.index')}}" title="Назад" class="btn btn-icon ml-2 btn-warning waves-effect waves-light">
            <i class="feather icon-corner-up-left"></i> Назад
        </a>

    </div>
</div>

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
                                <th scope="col">Факультет</th>
                                <th scope="col">Продолжительность</th>
                                <th scope="col">Цена, $/год</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partner->programs as $key=>$program)
                                <tr data-id="{{$program->id}}">
                                    <th scope="row">{{$key+1}}</th>
                                    <td> {{$program->name}}</td>
                                    <td> {{$program->type->name}}</td>
                                    <td> {{$program->faculty->name}}</td>
                                    <td> {{$program->duration->name}}</td>
                                    <td> {{$program->cost}}</td>
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



<!-- Add FacultyForm Modal -->
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
            @if ($faculties->count()>0)
            <form method="POST" action="{{route('admin.partner.faculty.attach', $partner->id)}}">
                @csrf
                <div class="modal-body">
                    <label>Факультет: </label>
                    <div class="form-group">
                        <select class="form-control" name="faculty">
                        @foreach($faculties as $faculty)
                            <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
                </div>
            </form>
            @else
                <div class="modal-body">
                    <h5>Нечего добавлять</h5>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- End Add FacultyForm Modal -->