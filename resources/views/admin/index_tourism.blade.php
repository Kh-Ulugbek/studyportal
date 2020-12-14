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
                                <label>Заголовок: </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" value="{{$tourism->title}}">
                                </div>
                                <label for="intro">Интро: </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="intro" id="intro"
                                              rows="3">{{$tourism->intro}}</textarea>
                                </div>
                                <label for="description">Описание: </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" id="description"
                                              rows="3">{{$tourism->description}}</textarea>
                                </div>

                                <label for="text">Текст: </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="text" id="text"
                                              rows="3">{{$tourism->text}}</textarea>
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