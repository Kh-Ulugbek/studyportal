<div class="row match-height">
    @foreach($certificates as $certificate)
        <div class="col-xl-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="{{asset($path)}}/{{$certificate->image}}">
                    <div class="card-body">
                        <h5 class="d-none" id="certificate-name">{{$certificate->name}}</h5>
                        <div class="card-btns d-flex">
                                <button title="Редактировать" data-id="{{$certificate->id}}" type="button"
                                        class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light"
                                        data-toggle="modal" data-target="#editCertificateForm">
                                    <i class="feather icon-edit"></i>
                                </button>
                                <button title="Удалить" data-id="{{$certificate->id}}" type="button"
                                        class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light"
                                        data-toggle="modal" data-target="#deleteCertificateForm">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addCertificateForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<!-- Edit Certificate Modal -->
<div class="modal fade text-left" id="editCertificateForm" tabindex="-1" role="dialog"
     aria-labelledby="editCertificateFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editCertificateFormLabel">Редактирование сертификата</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.certificate.update',$certificate->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <div class="col-md-6 m-auto">
                        <img class="card-img-top img-fluid" src=""/>
                    </div>
                    <label>Название: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Название" class="form-control" name="name" value="{{$certificate->name}}">
                    </div>
                    <label>Картинка: </label>
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
<!-- End Edit Certificate Modal -->

<!-- Add Certificate Modal -->
<div class="modal fade text-left" id="addCertificateForm" tabindex="-1" role="dialog"
     aria-labelledby="addCertificateFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editCertificateFormLabel">Добавление сертификата</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.certificate.store')}}"
                  enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="col-md-6 m-auto">
                        <img class="card-img-top img-fluid" src=""/>
                    </div>
                    <label>Название: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Название" class="form-control" name="name">
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
<!-- End Add Certificate Modal -->

<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteCertificateForm" tabindex="-1" role="dialog" aria-labelledby="deleteCertificateFormLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteCertificateFormLabel1">Удаление сертификата</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить сертификат <span class="text-bold-700">Сертификат</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.certificate.destroy',$certificate->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>