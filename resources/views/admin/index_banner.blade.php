<div class="row match-height">
@foreach($banners as $banner)
        <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content bg-primary">
                    <a href="#" title="Изменить" data-id="{{$banner->id}}" data-toggle="modal" data-target="#changeBannerForm">
                        <img class="card-img-top img-fluid" src="{{asset($banner->folder)}}/{{$banner->image}}">
                    </a>
                    <div class="card-body">
                        <a href="#" data-id="{{$banner->id}}" data-toggle="modal" data-target="#changeBannerForm">
                            <h5 class="text-white">{{$banner->alt_name}}</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endforeach
</div>


<!-- changeBanner Modal -->
<div class="modal fade text-left" id="changeBannerForm" tabindex="-1" role="dialog"
     aria-labelledby="changeBannerFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="changeBannerFormLabel">Изменить картинку</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <img class="card-img img-fluid" src="{{asset($banner->folder)}}/{{$banner->image}}">
            <form method="POST" action="{{route('admin.banner.change', $banner->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="image">Картинка: </label>
                    <div class="form-group">
                        <input type="file" class="form-control"  id="image" name="image" accept="image/*">
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
<!-- End changeBanner Modal -->