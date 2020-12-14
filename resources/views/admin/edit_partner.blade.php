<div class="row align-items-center">
    <div class="col-xl-10 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Редактирование партнера</h4>
                    <div class="row">
                        <div class="col-8">
                            <img class="img-fluid" src="{{asset($path)}}/{{$partner->image}}">
                        </div>
                        <div class="col-4">
                            <img style="max-height: 75px;" class="img-fluid"
                                 src="{{asset($path)}}/list/{{$partner->logo}}">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="{{route('admin.partner.update', $partner->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
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
                                <label for="partner-name">Наименование:</label>
                                <input type="text" id="partner-name" class="form-control" placeholder="Название"
                                       required name="name" value="{{$partner->name}}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="partner-name">Наименование(en):</label>
                                <input type="text" id="partner-name" class="form-control" placeholder="Название"
                                       name="name_en" value="{{$partner->name_en}}">
                            </div>
                            <div class="form-group">
                                <label for="partner-name">Наименование(uz):</label>
                                <input type="text" id="partner-name" class="form-control" placeholder="Название"
                                       name="name_uz" value="{{$partner->name_uz}}">
                            </div>

                            <div class="form-group">
                                <label for="partner-link">Сайт:</label>
                                <input type="text" id="partner-link" class="form-control" placeholder="Ссылка"
                                       name="link" value="{{$partner->link}}">
                            </div>
                            @error('link')
                            <div class="form-text text-danger"><p>{{$message}}</p></div>
                            @enderror
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="partner-city">Местонахождение:</label>
                                        <input type="text" id="partner-city" class="form-control"
                                               placeholder="Город, округ, штат" required name="city"
                                               value="{{$partner->city}}">
                                    </div>
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="partner-city">Местонахождение(en):</label>
                                        <input type="text" id="partner-city" class="form-control"
                                               placeholder="Город, округ, штат" name="city_en"
                                               value="{{ $partner->city_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="partner-city">Местонахождение(uz):</label>
                                        <input type="text" id="partner-city" class="form-control"
                                               placeholder="Город, округ, штат" name="city_uz"
                                               value="{{$partner->city_uz}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="partner-country">Страна:</label>
                                        <select name="country_id" id="partner-country" class="select2 form-control">
                                            @foreach($countries as $country)
                                                <option @if($partner->country->id == $country->id)selected
                                                        @endif value="{{$country->id}}">{{$country->name}}</option>
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
                                    <label for="partner-type">Тип:</label>
                                    <input type="text" id="partner-type" class="form-control" placeholder="Тип"
                                           name="type" value="{{$partner->type}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-type">Тип(en):</label>
                                    <input type="text" id="partner-type" class="form-control" placeholder="Тип"
                                           name="type_en" value="{{$partner->type_en}}">
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="partner-type">Тип(uz):</label>
                                    <input type="text" id="partner-type" class="form-control" placeholder="Тип"
                                           name="type_uz" value="{{$partner->type_uz}}">
                                </div>

                            </div>

                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="partner-students">Студенты:</label>
                                <input type="text" id="partner-students" class="form-control" placeholder="Студенты"
                                       name="students" value="{{$partner->students}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="partner-students">Студенты(en):</label>
                                <input type="text" id="partner-students" class="form-control"
                                       placeholder="Студенты" name="students_en" value="{{$partner->students_en}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="partner-students">Студенты(uz):</label>
                                <input type="text" id="partner-students" class="form-control"
                                       placeholder="Студенты" name="students_uz" value="{{$partner->students_uz}}">
                            </div>
                        </div>

                        <div class="col">
                            <label for="partner-title">Заголовок:</label>
                            <input type="text" id="partner-title" class="form-control" placeholder="Заголовок"
                                   name="title" value="{{$partner->title}}">
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="partner-title">Заголовок(en):</label>
                                <input type="text" id="partner-title" class="form-control" placeholder="Заголовок"
                                       name="title_en" value="{{$partner->title_en}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="partner-title">Заголовок(uz):</label>
                                <input type="text" id="partner-title" class="form-control" placeholder="Заголовок"
                                       name="title_uz" value="{{$partner->title_uz}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="partner-description">Описание(ru):</label>
                            <textarea name="description" id="partner-description" class="form-control"
                                      placeholder="Описание" rows="4">{!!  $partner->description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="partner-description">Описание(en):</label>
                            <textarea name="description_en" id="partner-description_en" class="form-control"
                                      placeholder="Описание" rows="4">{!!  $partner->description_en !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="partner-description">Описание(uz):</label>
                            <textarea name="description_uz" id="partner-description_uz" class="form-control"
                                      placeholder="Описание" rows="4">{!!  $partner->description_uz !!}</textarea>
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

<h3>Картинки</h3>
<div class="row align-items-center">
    @foreach($partner->images as $pimage)
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="{{asset('images')}}/universe-page/{{$pimage->path}}">
                    <div class="card-body">
                        <div class="card-btns d-flex">
                            <form action="{{route('admin.partner.image.destroy', $pimage->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button title="Удалить" type="submit"
                                        class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light"
        data-toggle="modal" data-target="#addPartnerImageForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<!-- Add Image Modal -->
<div class="modal fade text-left" id="addPartnerImageForm" tabindex="-1" role="dialog"
     aria-labelledby="addPartnerImageFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addPartnerImageFormLabel">Добавление картинки</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.partner.image.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <input type="hidden" value="{{$partner->id}}" name="university_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Image Modal -->


<script>
    CKEDITOR.replace('partner-description', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
    CKEDITOR.replace('partner-description_en', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
    CKEDITOR.replace('partner-description_uz', {
        width: '100%',
        height: '500',
        language: 'ru',
        allowedContent: true
    })
</script>