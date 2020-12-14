    <!-- Card Captions and Overlay section start -->
<section id="card-caps">
    <div class="row my-3 match-height">
        @foreach($partners as $partner)
            <div class="col-xl-6 col-md-6 col-sm-6">
                <div class="card">
                    <img style="max-height: 130px;" class="card-img-top img-fluid" src="{{asset($path)}}/{{$partner->image}}"
                         alt="{{$partner->name}}"/>
                    <div class="card-content">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img style="max-height: 120px;" class="card-img-top img-fluid" src="{{asset($path)}}/list/{{$partner->logo}}"
                                         alt="{{$partner->name}}"/>
                                </div>
                                <div class="col-md-7">
                                    <h4 id="partner-name" class="card-title">{{$partner->name}}</h4>
                                    <p>{{$partner->city}}, {{$partner->country->name}}</p>
                                    <a class="btn btn-light mr-1 mb-1 waves-effect waves-light" href="{{route('admin.partner.faculties.index', $partner->id)}}">Факультеты
                                        <span class="badge badge-pill badge-warning badge">{{$partner->faculties->count()}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-text mt-2">
                                <a href="{{route('admin.partner.edit', $partner->id)}}" class="btn btn-icon btn-primary mr-1 mb-1 waves-effect waves-light">
                                    <i class="feather icon-edit"></i>
                                </a>
                                <button title="Удалить" data-id="{{$partner->id}}" type="button"
                                        class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light"
                                        data-toggle="modal" data-target="#deletePartnerForm">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{route('admin.partner.create')}}" class="btn  btn-icon btn-success waves-effect waves-light">
        <i class="feather icon-plus-square"></i> Добавить
    </a>
</section>
<!-- Card Captions and Overlay section end -->

    <!-- Delete Partner Modal -->
    <div class="modal fade text-left" id="deletePartnerForm" tabindex="-1" role="dialog" aria-labelledby="deletePartnerFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deletePartnerFormLabel">Удаление партнера</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Вы действительно хотите удалить партнера <br><span class="text-bold-700">Партнер</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{route('admin.partner.destroy',$partner->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Да удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>