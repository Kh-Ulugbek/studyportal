<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Чеклисты</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="callbacks-table" class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">Кому</th>
                                <th scope="col">От кого</th>
                                <th scope="col">Сумма</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($checklists as $key=>$checklist)
                                <tr @if($checklist->checked)class="text-success"@endif>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>@if($checklist->checked)<i class="feather icon-check-circle"></i>@endif {{$checklist->title}}</td>
                                    <td>{{$checklist->user->name}} {{$checklist->user->last_name}}</td>
                                    <td> {{$checklist->fromto}}</td>
                                    <td> {{$checklist->cost}}</td>
                                    <td> {{$checklist->created_at->format("d/m/y H:i:s")}}</td>
                                    <td class="text-center">
                                        <form action="{{route('admin.checklist.destroy', $checklist->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button title="Удалить" type="submit" class="btn btn-sm btn-icon btn-danger waves-effect waves-light">
                                                <i class="feather icon-trash-2"></i>
                                            </button>
                                        </form>
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

{{$checklists->links()}}

<button type="button" class="btn  btn-icon btn-warning waves-effect waves-light" data-toggle="modal" data-target="#createCheckListForm">
    <i class="feather icon-plus-square"></i> Создать чеклист
</button>


<!-- createCheckListFormModal -->
<div class="modal fade text-left" id="createCheckListForm" tabindex="-1" role="dialog"
     aria-labelledby="createCheckListLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createCheckListLabel">Форма создания чеклиста</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.checklist.store')}}">
                @csrf
                <div class="modal-body">
                    <label for="title">Заголовок: </label>
                    <div class="form-group">
                        <textarea class="form-control" name="title" id="title" rows="4" required></textarea>
                    </div>

                    <label for="checklistTo">Кому: </label>
                    <div class="form-group">
                        <select name="checklistTo" id="checklistTo" class="form-control" required>
                            <option value="" selected disabled>Выберите получателя...</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="fromto">От кого: </label>
                    <div class="form-group">
                        <input id="fromto" type="text" class="form-control" name="fromto">
                    </div>

                    <label for="cost">Сумма: </label>
                    <div class="form-group">
                        <input id="cost" type="text" class="form-control" name="cost">
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
<!-- End createCheckListForm Modal -->