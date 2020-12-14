<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Список пользователей сайта</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-sm table-hover-animation mb-0 w-100">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Фамилия</th>
                                <th scope="col">Логин</th>
                                <th scope="col">Почта</th>
                                <th scope="col">Зарегистрирован</th>
                                <th scope="col">Последний визит</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td> {{$user->name}}</td>
                                    <td> {{$user->last_name}}</td>
                                    <td> {{$user->login}}</td>
                                    <td> {{$user->email}}</td>
                                    <td> {{$user->created_at->format("d/m/y H:i")}}</td>
                                    <td> {{($user->visited == null)?'неизвестно':$user->visited->format("d/m/y H:i")}}</td>
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

{{ $users->links() }}
