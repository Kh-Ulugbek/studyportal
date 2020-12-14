<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Подписки на новости</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="subscribes-table" class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Почта</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribes as $key=>$subscribe)
                                <tr data-id="{{$subscribe->id}}" style="cursor: pointer;" class="{{($subscribe->viewed)?'':'h6'}}">
                                    <th scope="row">{{$key+1}}</th>
                                    <td id="subscribe-email"> {{$subscribe->email}}</td>
                                    <td> {{$subscribe->created_at->format("d/m/y h:i:s")}}</td>
                                    <td>
                                        <button title="Удалить" data-id="{{$subscribe->id}}" type="button" class="btn btn-sm btn-icon btn-danger waves-effect waves-light" data-toggle="modal" data-target="#deleteSubscribeForm">
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

<!-- Pagination links -->
{{ $subscribes->links() }}

<a id="subscribe-read-link" class="d-none" href="{{route('admin.subscribe.read', 2)}}">Read</a>

<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteSubscribeForm" tabindex="-1" role="dialog" aria-labelledby="deleteSubscribeFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteSubscribeFormLabel">Удаление подписки</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить подписку <hr>
                    <span class="text-bold-700">Facebook</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.subscribe.destroy',0)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>