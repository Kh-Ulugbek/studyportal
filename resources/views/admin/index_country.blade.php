<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Список стран</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Картинка</th>
                                <th scope="col">Имя</th>
                                <th scope="col">F.A.Q</th>
                                <th class="text-center" colspan="2" scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $key => $country)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td id="country-image">
                                        <img style="max-width: 45px;" src="{{asset($path)}}/{{$country->image}}" alt="{{$country->name}}"
                                             title="{{$country->name}}">
                                    </td>
                                    <td id="country-name">{{$country->name}}</td>
                                    <td id="faq"><a href="{{route('admin.country-faqs.show', $country->id)}}">faqs <span class="badge badge-pill badge-info">@if ($country->faqs) {{$country->faqs->count()}} @else 0 @endif</span></a></td>
                                    <td class="col-1">
                                        <a title="Редактировать" href="{{route('admin.country.edit', $country->id)}}" class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                    </td>
                                    <td class="col-1">
                                        <button title="Удалить" data-id="{{$country->id}}" type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#deleteCountryForm">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addCountryForm">
                        <i class="feather icon-plus-square"></i> Добавить
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table head options end -->

<!-- Add Country Modal -->
<div class="modal fade text-left" id="addCountryForm" tabindex="-1" role="dialog" aria-labelledby="addCountryFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addCountryFormLabel">Добавление новой страны</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.country.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Наименование(ru): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Наименование" class="form-control" name="name" required>
                    </div>
                    <label>Наименование(en): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Наименование" class="form-control" name="name_en" >
                    </div>
                    <label>Наименование(uz): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Наименование" class="form-control" name="name_uz" >
                    </div>
                    <label>Флаг: </label>
                    <div class="form-group">
                        <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Country Modal -->
<div class="modal fade text-left" id="editCountryForm" tabindex="-1" role="dialog" aria-labelledby="editCountryFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editCountryFormLabel">Редактирование страны</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.country.update',$country->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <label>Наименование: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Наименование" class="form-control" name="name" value="{{$country->name}}">
                    </div>

                    <label>Флаг: </label>
                    <img style="max-width: 75px;" class="mb-1" src="{{asset($path)}}/{{$country->image}}">

                    <div class="form-group">
                        <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete Country Modal -->
<div class="modal fade text-left" id="deleteCountryForm" tabindex="-1" role="dialog" aria-labelledby="deleteCountryFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteCountryFormLabel">Удаление страны</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить страну <br><span class="text-bold-700">Страна</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.country.destroy',$country->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>