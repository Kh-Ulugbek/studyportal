<div class="row match-height">

    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Отправка файла пользователю</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{route('admin.files.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Пользователь:</span>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="custom-select" name="user_id" required>
                                                <option value="" disabled selected>Выберите пользователя</option>
                                @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Файл:</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" id="file" class="form-control" name="file" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Отправить</button>
                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Очистить</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Журнал отправленных файлов пользователям</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="callbacks-table" class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Кому</th>
                                <th scope="col">Файл</th>
                                <th scope="col">Дата</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userFiles as $key=>$userFile)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td> {{$userFile->user->name}} {{$userFile->user->last_name}}</td>
                                    <td> {{$userFile->name}}</td>
                                    <td> {{$userFile->created_at->format("d/m/y H:i:s")}}</td>
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

{{$userFiles->links()}}