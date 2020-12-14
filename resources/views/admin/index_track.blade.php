<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-uppercase">{{$track->title}}</h4>
                    <img style="max-height: 200px;" id="track-image" src="{{asset($path)}}/{{$track->image}}" class="img-fluid mt-2">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{route('admin.track.update', $track->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <label>Картинка: </label>
                                <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
                                <p><small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small></p>
                                <label>Заголовок(ru): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" value="{{$track->title}}">
                                </div>
                                <label>Заголовок(en): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title_en" value="{{$track->title_en}}">
                                </div>
                                <label>Заголовок(uz): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title_uz" value="{{$track->title_uz}}">
                                </div>
                                <label>Текст(ru): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="text" id="text"
                                              rows="3">{{$track->text}}</textarea>
                                </div>
                                <label>Текст(en): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="text_en" id="text_en"
                                              rows="3">{{$track->text_en}}</textarea>
                                </div>
                                <label>Текст(uz): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="text_uz" id="text_uz"
                                              rows="3">{{$track->text_uz}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Подпись 1: </label>
                                            <input type="text" class="form-control" name="subt1"
                                                   value="{{$track->subt1}}">
                                        </div>
                                        <label>Цифра 1: </label>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="num1"
                                                   value="{{$track->num1}}">
                                        </div>
                                        <label>Иконка 1: </label>
                                        <img id="track-image" src="{{asset($path)}}/{{$track->ico1}}"
                                             class="img-fluid mb-1">
                                        <div class="form-group">
                                            <input type="file" placeholder="Ссылка" class="form-control" name="ico1" accept="image/*">
                                            <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Подпись 2: </label>
                                            <input type="text" class="form-control" name="subt2"
                                                   value="{{$track->subt2}}">
                                        </div>
                                        <label>Цифра 2: </label>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="num2"
                                                   value="{{$track->num2}}">
                                        </div>
                                        <label>Иконка 2: </label>
                                        <img id="track-image" src="{{asset($path)}}/{{$track->ico2}}"
                                             class="img-fluid mb-1">
                                        <div class="form-group">
                                            <input type="file" placeholder="Ссылка" class="form-control" name="ico2" accept="image/*">
                                            <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                                        </div>
                                    </div>
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