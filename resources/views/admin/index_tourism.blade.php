<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-uppercase">{{$tourism->name}}</h4>
                    <img style="max-height: 200px;" id="track-image" src="{{asset($path)}}/{{$tourism->image}}" class="img-fluid mt-2">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{route('admin.tourism.update', $tourism->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <label>Картинка: </label>
                                <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
                                <p><small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small></p>
                                <label>Заголовок(ru): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" value="{{$tourism->title}}">
                                </div>
                                <label>Заголовок(en): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title_en" value="{{$tourism->title_en}}">
                                </div>
                                <label>Заголовок(uz): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title_uz" value="{{$tourism->title_uz}}">
                                </div>
                                <label for="intro">Интро(ru): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="intro" id="intro"
                                              rows="3">{{$tourism->intro}}</textarea>
                                </div>
                                <label for="intro">Интро(en): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="intro_en" id="intro"
                                              rows="3">{{$tourism->intro_en}}</textarea>
                                </div>
                                <label for="intro">Интро(uz): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="intro_uz" id="intro"
                                              rows="3">{{$tourism->intro_uz}}</textarea>
                                </div>
                                <label for="description">Описание: </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" id="description"
                                              rows="3">{{$tourism->description}}</textarea>
                                </div>
                                <label for="description">Описание(en): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="description_en" id="description"
                                              rows="3">{{$tourism->description_en}}</textarea>
                                </div>
                                <label for="description">Описание(uz): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="description_uz" id="description"
                                              rows="3">{{$tourism->description_uz}}</textarea>
                                </div>

                                <label for="text">Текст(ru): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="text" id="text"
                                              rows="3">{{$tourism->text}}</textarea>
                                </div>
                                <label for="text">Текст(en): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="text_en" id="text"
                                              rows="3">{{$tourism->text_en}}</textarea>
                                </div>
                                <label for="text">Текст(uz): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="text_uz" id="text"
                                              rows="3">{{$tourism->text_uz}}</textarea>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Сохранить</button>
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
</section>
<!-- // Basic Floating Label Form section end -->