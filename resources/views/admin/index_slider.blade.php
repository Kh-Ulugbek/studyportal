<!-- Card Captions and Overlay section start -->
<section id="card-caps">
    <div class="row my-3">
        @foreach($sliders as $slider)
        <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$slider->image}}" alt="{{$slider->title}}" />
                    <div class="card-body">
                        <h4 id="slider-title" class="card-title">{{$slider->title}}</h4>
                        <h4 hidden id="slider-title_en" class="card-title">{{$slider->title_en}}</h4>
                        <h4 hidden id="slider-title_uz" class="card-title">{{$slider->title_uz}}</h4>
                        <p id="slider-text" class="card-text">{!! $slider->text !!}</p>
                        <p hidden id="slider-text_en" class="card-text">{!! $slider->text_en !!}</p>
                        <p hidden id="slider-text_uz" class="card-text">{!! $slider->text_uz !!}</p>
                        <p class="card-text">
                        <a id="slider-link" href="{{$slider->link}}" class="btn btn-outline-warning waves-effect waves-light">Кнопка</a>
                        {{$slider->link}}
                            </p>
                        <button title="Редактировать" data-id="{{$slider->id}}" type="button" class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#editSliderForm">
                            <i class="feather icon-edit"></i>
                        </button>
                        <button title="Удалить" data-id="{{$slider->id}}" type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#deleteSliderForm">
                            <i class="feather icon-trash-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addSliderForm">
        <i class="feather icon-plus-square"></i> Добавить
    </button>
</section>
<!-- Card Captions and Overlay section end -->


<!-- Edit Slider Modal -->
<div class="modal fade text-left" id="editSliderForm" tabindex="-1" role="dialog" aria-labelledby="editSliderFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editSliderFormLabel">Редактирование слайдера</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.slider.update',$slider->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <img class="card-img-top img-fluid" src=""/>
                    <label>Заголовок(ru): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Заголовок" class="form-control" name="title" value="{{$slider->title}}">
                    </div>
                    <label>Заголовок(en): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Заголовок" class="form-control" name="title_en" value="{{$slider->title_en}}">
                    </div>
                    <label>Заголовок(uz): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Заголовок" class="form-control" name="title_uz" value="{{$slider->title_uz}}">
                    </div>

                    <label>Текст(ru): </label>
                    <div class="form-group">
                        <textarea name="text" id="sliderText" class="form-control" rows="3">{!! $slider->text !!}</textarea>
                    </div>
                    <label>Текст(en): </label>
                    <div class="form-group">
                        <textarea name="text_en" id="sliderText_en" class="form-control" rows="3">{!! $slider->text_en !!}</textarea>
                    </div>
                    <label>Текст(uz): </label>
                    <div class="form-group">
                        <textarea name="text_uz" id="sliderText_uz" class="form-control" rows="3">{!! $slider->text_uz !!}</textarea>
                    </div>

                    <label>Ссылка: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Ссылка" class="form-control" name="link" value="{{$slider->link}}">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
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
<!-- End Edit Slider Modal -->


<!-- Add Slider Modal -->
<div class="modal fade text-left" id="addSliderForm" tabindex="-1" role="dialog" aria-labelledby="addSliderFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addSliderFormLabel">Довавление слайдера</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.slider.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <img class="card-img-top img-fluid" src=""/>
                    <label>Заголовок(ru): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Заголовок" class="form-control" name="title">
                    </div>
                    <label>Заголовок(en): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Заголовок" class="form-control" name="title_en">
                    </div>
                    <label>Заголовок(uz): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Заголовок" class="form-control" name="title_uz">
                    </div>

                    <label>Текст(ru): </label>
                    <div class="form-group">
                        <textarea name="text" id="sliderText" class="form-control" rows="3"></textarea>
                    </div>
                    <label>Текст(en): </label>
                    <div class="form-group">
                        <textarea name="text_en" id="sliderText_en" class="form-control" rows="3"></textarea>
                    </div>
                    <label>Текст(uz): </label>
                    <div class="form-group">
                        <textarea name="text_uz" id="sliderText_uz" class="form-control" rows="3"></textarea>
                    </div>

                    <label>Ссылка: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Ссылка" class="form-control" name="link">
                    </div>
                    <label>Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" accept="image/*">
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
<!-- End Add Slider Modal -->

<!-- Delete Slider Modal -->
<div class="modal fade text-left" id="deleteSliderForm" tabindex="-1" role="dialog" aria-labelledby="deleteSliderFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteSliderFormLabel">Удаление слайдера</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить слайдер <span class="text-bold-700">Слайдер</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.slider.destroy',$slider->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>