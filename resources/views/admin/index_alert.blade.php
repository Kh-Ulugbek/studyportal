<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Журнал отправленных уведомлений пользователям</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="callbacks-table" class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Тип</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">Текст</th>
                                <th scope="col">Кому</th>
                                <th scope="col">Дата</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($alerts as $key=>$alert)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td> {{$alert->type}}</td>
                                    <td> {{$alert->title}}</td>
                                    <td> {{$alert->text}}</td>
                                    <td> {{$alert->recipient}}</td>
                                    <td> {{$alert->created_at->format("d/m/y H:i:s")}}</td>
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

{{$alerts->links()}}

<button type="button" class="btn  btn-icon btn-warning waves-effect waves-light" data-toggle="modal" data-target="#createAlertForm">
    <i class="feather icon-plus-square"></i> Создать уведомление
</button>

<!-- Add Type Modal -->
<div class="modal fade text-left" id="createAlertForm" tabindex="-1" role="dialog"
     aria-labelledby="createAlertFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createAlertFormLabel">Форма создания уведомления</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.alerts.store')}}">
                @csrf
                <div class="modal-body">
                    <label for="title">Заголовок: </label>
                    <div class="form-group">
                        <input id="title" type="text" class="form-control" name="title" required>
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

                    <label for="alertTo">Кому: </label>
                    <div class="form-group">
                        <select name="alertTo" id="alertTo" class="form-control">
                            <option value="0" selected>Всем!</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="text">Текст: </label>
                    <div class="form-group">
                        <textarea name="text" id="text" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Отправить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Type Modal -->