<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-uppercase">{{$country->name}}</h4>
                    <img style="max-height: 200px;" id="elite-image" src="{{asset($path)}}/info/{{$country->info->image}}" class="img-fluid mt-2">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{route('admin.country.update', $country->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <label>Картинка: </label>
                                <input type="file" placeholder="Ссылка" class="form-control" name="infoimage" accept="image/*">
                                <p> <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small></p>
                                <div class="row align-items-end">
                                    <div class="col-6 mb-1">
                                        <label>Наименование(ru): </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="{{$country->name}}">
                                        </div>
                                        <label>Наименование(en): </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name_en" value="{{$country->name_en}}">
                                        </div>
                                        <label>Наименование(uz): </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name_uz" value="{{$country->name_uz}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Флаг: </label>
                                        <img style="max-height: 200px;" id="elite-image" src="{{asset($path)}}/{{$country->image}}" class="img-fluid mb-1">
                                        <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
                                        <p> <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small></p>
                                    </div>
                                </div>

                                <label>Заголовок(ru): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" value="{{$country->info->title}}">
                                </div>
                                <label>Заголовок(en): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title_en" value="{{$country->info->title_en}}">
                                </div>
                                <label>Заголовок(uz): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title_uz" value="{{$country->info->title_uz}}">
                                </div>
                                <label for="description">Описание(ru): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" id="description" rows="4">{{$country->info->description}}</textarea>
                                </div>
                                <label for="description">Описание(en): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="description_en" id="description_en" rows="4">{{$country->info->description}}</textarea>
                                </div>
                                <label for="description">Описание(uz): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="description_uz" id="description_uz" rows="4">{{$country->info->description}}</textarea>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Сохранить</button>
                                        <a href="{{route('admin.country.index')}}" class="btn btn-outline-warning mr-1 mb-1">Назад</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic Floating Label Form section end -->