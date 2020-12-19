<div class="row">
    @foreach($subjects as $subject)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card border-info text-center bg-transparent">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title mt-3">{{$subject->__('name')}}</h4>
                    <a href="{{route('admin.faqs.show', $subject->id)}}" class="btn btn-info mt-1">Прейти</a>
                </div>
            </div>
        </div>
    </div>
   @endforeach
</div>