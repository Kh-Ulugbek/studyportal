<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Сообщения из формы контактов</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="messages-table" class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Почта</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Сообщение</th>
                                <th scope="col">Дата</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $key=>$message)
                                <tr data-id="{{$message->id}}" style="cursor: pointer;" class="{{($message->viewed)?'':'h6'}}">
                                    <th scope="row">{{$key+1}}</th>
                                    <td> {{$message->name}}</td>
                                    <td> {{$message->email}}</td>
                                    <td> {{$message->phone}}</td>
                                    <td> {{$message->text}}</td>
                                    <td> {{$message->created_at->format("d/m/y H:i:s")}}</td>
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
{{ $messages->links() }}


        <!-- Modal -->
<div class="modal fade text-left" id="modal-message" tabindex="-1" role="dialog" aria-labelledby="modalMessageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success white">
                <h5 class="modal-title" id="modalMessageLabel">Сообщение из формы контактов</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <small id="date" class="mt-1"></small>
                <div class="row">
                    <div class="col">
                        <h5>Телефон:</h5>
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
                <form id="message-delete" action="{{route('admin.message.destroy', 0)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>

                <form id="message-read" action="{{route('admin.message.read', 0)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Прочитано</button>
                </form>
            </div>
        </div>
    </div>
</div>
