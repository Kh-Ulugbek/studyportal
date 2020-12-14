<div class="content-body">
    <section>
        <div class="settings-account">
            <!-- <h6 class="mb-1">Account</h6> -->
            <div class="card user-form">
                <div class="card-header">
                    <h4 class="card-title">Профиль</h4>
                </div>
                <div class="card-body">
                    <div class="collapse-header">
                        <div id="headingCollapse1">
                            <div class="lead collapse-title" data-toggle="collapse" role="button" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img class="rounded-circle mr-2" src="{{route('get.avatar')}}" alt="{{$user->name}}" height="64" width="64" />
                                    </a>

                                    <div class="media-body mt-1">
                                        <h5 class="media-heading mb-0">{{$user->name}}</h5>
                                        <a class="text-muted" href="#"><small>{{$user->email}}</small></a>
                                    </div>
                                   </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse mt-2">
                        <div class="card-content">

                            <form class="form form-vertical" action="{{route('admin.user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="avatar-vertical">Аватар:</label>
                                    <div class="position-relative has-icon-left">
                                        <input id="avatar-vertical" type="file" class="form-control" name="avatar" accept="image/*">
                                        <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name-vertical">Имя:</label>
                                    <div class="position-relative has-icon-left">
                                        <input id="name-vertical" type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="last-name-vertical">Фамилия:</label>
                                    <div class="position-relative has-icon-left">
                                        <input id="last-name-vertical" type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email-vertical">Почта:</label>
                                    <div class="position-relative has-icon-left">
                                        <input id="email-vertical" type="email" class="form-control" name="email" value="{{$user->email}}" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-mail"></i>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-1 mb-1">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex border-top pt-2 pl-2 pr-2">

                </div>
            </div>
        </div>

        <!-- Security-begins -->
        <div class="settings-security">
            <div class="card collapse-icon accordion-icon-rotate">
                <div class="card-header">
                    <h4 class="card-title">Безопасность</h4>
                </div>
                <div class="card-body">
                    <div class="card collapse-header">
                        <div id="headingCollapse2" class="">
                            <div class="lead collapse-title" data-toggle="collapse" role="button" data-target="#collapse2" aria-expanded="false" aria-controls="collapse1">
                                <div class="change-password">
                                    <span>Изменить логин и пароль</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapse2" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse">
                        <div class="card-content">
                            <form class="form form-vertical" action="{{route('admin.user.security')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="login-vertical">Логин:</label>
                                    <div class="position-relative has-icon-left">
                                        <input id="login-vertical" type="text" class="form-control" name="login" value="{{$user->login}}" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                    </div>
                                    @error('login')
                                    <div class="form-text text-danger"><p>{{$message}}</p></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-vertical1">Старый пароль:</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="password" class="form-control" name="password" placeholder="Старый пароль" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-at-sign"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                    <div class="form-text text-danger"><p>{{$message}}</p></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-vertical2">Новый пароль:</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="password" class="form-control" name="newpassword" placeholder="Новый пароль" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-at-sign"></i>
                                        </div>
                                    </div>
                                    @error('newpassword')
                                    <div class="form-text text-danger"><p>{{$message}}</p></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-vertical3">Подтверждение пароля:</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Подтверждение пароля" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-at-sign"></i>
                                        </div>
                                    </div>
                                    @error('password_confirmation')
                                    <div class="form-text text-danger"><p>{{$message}}</p></div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success mr-1 mb-1">Сохранить</button>
                            </form>
                        </div>
                    </div>
                    <div class="delete-account border-top pt-1">

                    </div>
                </div>
            </div>
        </div>
        <!-- Security-end -->
    </section>
</div>