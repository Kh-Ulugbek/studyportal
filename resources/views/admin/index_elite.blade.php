<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-uppercase">{{$elite->title}}</h4>
                    <img style="max-height: 200px;" id="elite-image" src="{{asset($path)}}/{{$elite->image}}" class="img-fluid mt-2">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{route('admin.elite.update', $elite->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <label>Картинка: </label>
                                <input type="file" placeholder="Ссылка" class="form-control" name="image" accept="image/*">
                               <p> <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small></p>
                                <label>Заголовок(ru): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" value="{{$elite->title}}">
                                </div>
                                <label>Заголовок(en): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title_en" value="{{$elite->title_en}}">
                                </div>
                                <label>Заголовок(uz): </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title_uz" value="{{$elite->title_uz}}">
                                </div>
                                <label>Ссылка: </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="link" value="{{$elite->link}}">
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