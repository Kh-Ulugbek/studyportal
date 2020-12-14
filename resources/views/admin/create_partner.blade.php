<div class="row align-items-center">
    <div class="col-xl-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Добавление нового партнера</h4>
                </div>

                <div class="card-body">
                    <form class="form" action="{{route('admin.partner.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col">
                                    <label>Картинка: </label>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                    </div>
                                </div>
                                <div class="col">

                                    <label>Лого: </label>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="logo" accept="image/*">
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="partner-name">Наименование(ru):</label>
                                <input type="text" id="partner-name" class="form-control" placeholder="Название"
                                       required name="name" value="{{old('name')}}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="partner-name">Наименование(en):</label>
                                <input type="text" id="partner-name" class="form-control" placeholder="Название"
                                       name="name_en" value="{{old('name_en')}}">
                            </div>
                            <div class="form-group">
                                <label for="partner-name">Наименование(uz):</label>
                                <input type="text" id="partner-name" class="form-control" placeholder="Название"
                                       name="name_uz" value="{{old('name_uz')}}">
                            </div>

                            <div class="form-group">
                                <label for="partner-link">Сайт:</label>
                                <input type="text" id="partner-link" class="form-control" placeholder="Ссылка"
                                       name="link" value="{{old('link')}}">
                            </div>
                            @error('link')
                            <div class="form-text text-danger"><p>{{$message}}</p></div>
                            @enderror
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="partner-city">Местонахождение(ru):</label>
                                        <input type="text" id="partner-city" class="form-control"
                                               placeholder="Город, округ, штат" required name="city"
                                               value="{{old('city')}}">
                                    </div>
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="partner-city">Местонахождение(en):</label>
                                        <input type="text" id="partner-city" class="form-control"
                                               placeholder="Город, округ, штат" name="city_en"
                                               value="{{old('city_en')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="partner-city">Местонахождение(uz):</label>
                                        <input type="text" id="partner-city" class="form-control"
                                               placeholder="Город, округ, штат" name="city_uz"
                                               value="{{old('city_uz')}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="partner-country">Страна:</label>
                                        <select name="country_id" id="partner-country" class="select2 form-control">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('country_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-type">Тип(ru):</label>
                                    <input type="text" id="partner-type" class="form-control" placeholder="Тип"
                                           name="type" value="{{old('type')}}">
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-type">Тип(en):</label>
                                    <input type="text" id="partner-type" class="form-control" placeholder="Тип"
                                           name="type_en" value="{{old('type_en')}}">
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-type">Тип(uz):</label>
                                    <input type="text" id="partner-type" class="form-control" placeholder="Тип"
                                           name="type_uz" value="{{old('type_uz')}}">
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-students">Студенты(ru):</label>
                                    <input type="text" id="partner-students" class="form-control"
                                           placeholder="Студенты" name="students" value="{{old('students')}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-students">Студенты(en):</label>
                                    <input type="text" id="partner-students" class="form-control"
                                           placeholder="Студенты" name="students_en" value="{{old('students_en')}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-students">Студенты(uz):</label>
                                    <input type="text" id="partner-students" class="form-control"
                                           placeholder="Студенты" name="students_uz" value="{{old('students_uz')}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-title">Заголовок(ru):</label>
                                    <input type="text" id="partner-title" class="form-control" placeholder="Заголовок"
                                           name="title" value="{{old('title')}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-title">Заголовок(en):</label>
                                    <input type="text" id="partner-title" class="form-control" placeholder="Заголовок"
                                           name="title_en" value="{{old('title_en')}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-title">Заголовок(uz):</label>
                                    <input type="text" id="partner-title" class="form-control" placeholder="Заголовок"
                                           name="title_uz" value="{{old('title_uz')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="partner-description">Описание(ru):</label>
                                <textarea name="description" id="partner-description" class="form-control"
                                          placeholder="Описание" rows="4">{!! old('description') !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="partner-description">Описание(en):</label>
                                <textarea name="description_en" id="partner-description-en" class="form-control"
                                          placeholder="Описание" rows="4">{!! old('description_en') !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="partner-description">Описание(uz):</label>
                                <textarea name="description_uz" id="partner-description-uz" class="form-control"
                                          placeholder="Описание" rows="4">{!! old('description_uz') !!}</textarea>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary mr-1">Сохранить</button>
                            <a href="{{route('admin.partner.index')}}" class="btn btn-outline-warning">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    CKEDITOR.replace('partner-description', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
    CKEDITOR.replace('partner-description-en', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
    CKEDITOR.replace('partner-description-uz', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
</script>