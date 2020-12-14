<h2>{{$region->name}}</h2>
<div class="row match-height">
    @foreach($region->places as $place)
        <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <div id="place-name" class="card-title  mb-0">{{$place->name}}</div>
                        <div class="row">
                            <div class="col-md-6">
                                <img id="place-image1" class="card-img img-fluid" src="{{asset($path)}}/{{$place->image1}}">
                            </div>
                            <div class="col-md-6">
                                <img id="place-image2" class="card-img img-fluid" src="{{asset($path)}}/{{$place->image2}}">
                            </div>

                        </div>
                        <div class="card-text mt-1">
                            <div class="text-muted text-justify mt-1">
                                <small id="place-description">{{$place->description}}</small>
                            </div>
                        </div>

                        <div class="card-btns mt-2">
                            <button title="Редактировать" data-id="{{$place->id}}" type="button"
                                    class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light"
                                    data-toggle="modal" data-target="#editPlaceForm">
                                <i class="feather icon-edit"></i>
                            </button>
                            <button title="Удалить" data-id="{{$place->id}}" type="button"
                                    class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light"
                                    data-toggle="modal" data-target="#deletePlaceForm">
                                <i class="feather icon-trash-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addPlaceForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<a href="{{route('admin.tourism-pages.index')}}" title="Назад" class="btn  btn-icon btn-warning mr-1 mb-1 waves-effect waves-light">
    <i class="feather icon-corner-up-left"></i> Регионы
</a>


<!-- Add Place Modal -->
<div class="modal fade text-left" id="addPlaceForm" tabindex="-1" role="dialog"
     aria-labelledby="addPlaceFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addPlaceFormLabel">Добавление достопримечательности</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form method="POST" action="{{route('admin.tourism-places.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="image1">Картинка 1: </label>
                            <div class="form-group">
                                <input type="file" class="form-control"  id="image1" name="image1" accept="image/*">
                            </div>
                        </div>
                        <div class="col">
                            <label for="image2">Картинка 2: </label>
                            <div class="form-group">
                                <input type="file" class="form-control"  id="image2" name="image2" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <label for="name">Наименование: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <input type="hidden" value="{{$region->id}}" name="region_id">
                    <label for="description">Описание: </label>
                    <div class="form-group">
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
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
<!-- End Add Place Modal -->

@if (isset($place))
<!-- Edit Place Modal -->
<div class="modal fade text-left" id="editPlaceForm" tabindex="-1" role="dialog"
     aria-labelledby="editPlaceFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editPlaceFormLabel">Изменение достопримечательности</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form method="POST" action="{{route('admin.tourism-places.update', $place->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <img  id="image1"  class="card-img img-fluid" src="{{asset($path)}}/{{$place->image1}}">
                            <label for="image1">Картинка 1: </label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image1" accept="image/*">
                            </div>
                        </div>
                        <div class="col">
                            <img id="image2"  class="card-img img-fluid" src="{{asset($path)}}/{{$place->image2}}">
                            <label for="image2">Картинка 2: </label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image2" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <label for="name">Наименование: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" value="{{$place->name}}">
                    </div>

                    <label for="description">Описание: </label>
                    <div class="form-group">
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{$place->description}}</textarea>
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
<!-- End Edit Place Modal -->

<!-- Delete Place Modal -->
<div class="modal fade text-left" id="deletePlaceForm" tabindex="-1" role="dialog" aria-labelledby="deletePlaceFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deletePlaceFormLabel">Удаление достопримечательности</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить достопримечательность: <br><span class="text-bold-700">Достопримечательность</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.tourism-places.destroy', $place->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
