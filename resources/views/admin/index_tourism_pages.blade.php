<div class="row match-height">
    @foreach($regions as $region)
        <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p id="region-name" class="card-text  mb-0">{{$region->name}}</p>
                            </div>
                            <div class="col-md-8">
                                <img class="card-img img-fluid" src="{{asset($path)}}/{{$region->image}}">
                            </div>

                        </div>
                        <div class="card-text mt-1">
                           Заголовок: <span id="region-title" class="h5">{{$region->title}}</span>
                            <div class="text-muted text-justify mt-1">
                                <small id="region-description">{{$region->description}}</small>
                                <small hidden id="region-description_en">{{$region->description_en}}</small>
                                <small hidden id="region-description_uz">{{$region->description_uz}}</small>
                            </div>
                        </div>
                        <div class="card-header">
                            <a href="{{route('admin.tourism-places.show', $region->id)}}">Достопримечательности
                                <span class="badge badge badge-primary badge-pill float-right mr-2">{{$region->places->count()}}</span>
                            </a>
                        </div>
                        <div class="card-btns mt-2">
                            <button title="Редактировать" data-id="{{$region->id}}" type="button"
                                    class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light"
                                    data-toggle="modal" data-target="#editRegionForm">
                                <i class="feather icon-edit"></i>
                            </button>
                            <button title="Удалить" data-id="{{$region->id}}" type="button"
                                    class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light"
                                    data-toggle="modal" data-target="#deleteRegionForm">
                                <i class="feather icon-trash-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addRegionForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>


<!-- Edit Region Modal -->
<div class="modal fade text-left" id="editRegionForm" tabindex="-1" role="dialog"
     aria-labelledby="editRegionFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editRegionFormLabel">Редактирование региона</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form method="POST" action="{{route('admin.tourism-pages.update',$region->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <div class="col-md-6 m-auto">
                        <img class="card-img img-fluid" src="{{asset($path)}}/{{$region->image}}">
                    </div>
                    <div class="form-group  mt-1">
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                    </div>
                    <label for="name">Наименование(ru): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" value="{{$region->name}}">
                    </div>
                    <label for="name">Наименование(en): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_en" id="name" value="{{$region->name_en}}">
                    </div>
                    <label for="name">Наименование(uz): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_uz" id="name" value="{{$region->name_uz}}">
                    </div>
                    <label for="title">Заголовок(ru): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" value="{{$region->title}}">
                    </div>
                    <label for="title">Заголовок(en): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title_en" id="title" value="{{$region->title_en}}">
                    </div>
                    <label for="title">Заголовок(uz): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title_uz" id="title" value="{{$region->title_uz}}">
                    </div>
                    <label for="description">Описание(ru): </label>
                    <div class="form-group">
                        <textarea name="description" id="description" class="form-control"
                                  rows="4">{!! $region->description !!}</textarea>
                    </div>
                    <label for="description">Описание(en): </label>
                    <div class="form-group">
                        <textarea name="description_en" id="description" class="form-control"
                                  rows="4">{!! $region->description_en !!}</textarea>
                    </div>
                    <label for="description">Описание(uz): </label>
                    <div class="form-group">
                        <textarea name="description_uz" id="description" class="form-control"
                                  rows="4">{!! $region->description_uz !!}</textarea>
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
<!-- End Edit Region Modal -->


<!-- Add Region Modal -->
<div class="modal fade text-left" id="addRegionForm" tabindex="-1" role="dialog"
     aria-labelledby="addRegionFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addRegionFormLabel">Добавление региона</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form method="POST" action="{{route('admin.tourism-pages.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="image">Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control"  id="image" name="image" accept="image/*">
                        <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                    </div>
                    <label for="name">Наименование(ru): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <label for="name">Наименование(en): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_en" id="name" >
                    </div>
                    <label for="name">Наименование(uz): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_uz" id="name" >
                    </div>
                    <label for="title">Заголовок(ru): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <label for="title">Заголовок(en): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title_en" id="title">
                    </div>
                    <label for="title">Заголовок(uz): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title_uz" id="title">
                    </div>
                    <label for="description">Описание(ru): </label>
                    <div class="form-group">
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <label for="description">Описание(en): </label>
                    <div class="form-group">
                        <textarea name="description_en" id="description" class="form-control" rows="4"></textarea>
                    </div>
                    <label for="description">Описание(uz): </label>
                    <div class="form-group">
                        <textarea name="description_uz" id="description" class="form-control" rows="4"></textarea>
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
<!-- End Add Region Modal -->


<!-- Delete Region Modal -->
<div class="modal fade text-left" id="deleteRegionForm" tabindex="-1" role="dialog" aria-labelledby="deleteRegionFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteRegionFormLabel">Удаление региона</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить регион: <br><span class="text-bold-700">Регион</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.tourism-pages.destroy',$region->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>