<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Заявки на обратный звонок</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="callbacks-table" class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Почта</th>
                                <th scope="col">Город</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Сообщение</th>
                                <th scope="col">Дата</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($callbacks as $key=>$callback)
                                <tr data-id="{{$callback->id}}" style="cursor: pointer;" class="{{($callback->viewed)?'':'h6'}}">
                                    <th scope="row">{{$key+1}}</th>
                                    <td> {{$callback->name}}</td>
                                    <td> {{$callback->email}}</td>
                                    <td> {{$callback->city}}</td>
                                    <td> {{$callback->phone}}</td>
                                    <td> {{$callback->message}}</td>
                                    <td> {{$callback->created_at->format("d/m/y H:i:s")}}</td>
                                    <td class="text-center">
                                        <form action="{{route('admin.callback.destroy', $callback->id)}}" method="post">
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

<!-- Pagination links -->
{{ $callbacks->links() }}

<!-- Modal -->
<div class="modal fade text-left" id="modal-callback" tabindex="-1" role="dialog" aria-labelledby="modalCallbackLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success white">
                <h5 class="modal-title" id="modalCallbackLabel">Заявка на обратный звонок</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <small id="date" class="mt-1"></small>
                <div class="row">
                    <div class="col">
                        <h5>Город:</h5>
                        <p id="city"></p>
                    </div>
                    <div class="col">
                        <h5>Номер:</h5>
                        <p id="phone"></p>
                    </div>
                    <div class="col">
                        <h5>Почта:</h5>
                        <p id="email"></p>
                    </div>
                </div>

                <h5>Сообщение:</h5>
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <form id="callback-delete"  action="{{route('admin.callback.destroy', 0)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
                <form id="callback-read" action="{{route('admin.callback.read', 0)}}" method="post">
                    @csrf
                <button type="submit" class="btn btn-success">Прочитано</button>
                </form>
            </div>
        </div>
    </div>
</div>