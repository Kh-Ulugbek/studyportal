<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-uppercase">{{$history->header}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{route('admin.history.update', $history->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">

                                <label>Заголовок(ru): </label>
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="header" value="{{$history->header}}">
                                </div>
                                <label>Заголовок(en): </label>
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="header_en" value="{{$history->header_en}}">
                                </div>
                                <label>Заголовок(uz): </label>
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="header_uz" value="{{$history->header_uz}}">
                                </div>
                                <label>Параграф(ru): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="paragraph" required value="{{$history->paragraph}}">
                                </div>
                                <label>Параграф(en): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="paragraph_en" value="{{$history->paragraph_en}}">
                                </div>
                                <label>Параграф(uz): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="paragraph_uz" value="{{$history->paragraph_uz}}">
                                </div>

                                <label>Абзац(ru): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="span" required id="span">{{$history->span}}</textarea>
                                </div>
                                <label>Абзац(en): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="span_en" id="span">{{$history->span_en}}</textarea>
                                </div>
                                <label>Абзац(uz): </label>
                                <div class="form-group">
                                    <textarea class="form-control" name="span_uz" id="span">{{$history->span_uz}}</textarea>
                                </div>
                                <div class="row">
                                    @foreach($history->icons as $key =>$icon)
                                        <div class="col-6">
                                            <img style="max-height: 100px;" src="{{asset($path)}}/{{$icon->image}}"
                                                 class="img-fluid mb-1"><br>
                                            <div class="form-group">
                                                <input type="text" class="form-control" required name="{{$key}}-text"
                                                       value="{{$icon->text}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" required name="{{$key}}-text_en"
                                                       value="{{$icon->text_en}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" required name="{{$key}}-text_uz"
                                                       value="{{$icon->text_uz}}">
                                            </div>
                                            <label>Иконка: </label>
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="{{$key}}-image" accept="image/*">
                                            </div>
                                            <div class="divider divider-dark"></div>
                                        </div>

                                    @endforeach
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