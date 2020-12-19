<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{$subject->__('name')}}
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @foreach($faqs as $faq)
                        <div class="alert alert-dark" role="alert">
                            <form action="{{route('admin.faqs.destroy', $faq->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="close">
                                    <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                </button>
                            </form>
                            <h4 class="alert-heading">{{$faq->__('question')}}</h4>
                            <p class="mb-0">
                                {{$faq->__('answer')}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn  btn-icon btn-success waves-effect waves-light" data-toggle="modal"
        data-target="#addFaqForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<a href="{{route('admin.faqs.index')}}" title="Назад" class="btn btn-icon ml-2 btn-warning waves-effect waves-light">
    <i class="feather icon-corner-up-left"></i> Назад
</a>

<!-- Add addFaqForm Modal -->
<div class="modal fade text-left" id="addFaqForm" tabindex="-1" role="dialog"
     aria-labelledby="addFaqFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addFaqFormLabel">Добавление FAQ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{route('admin.faqs.store')}}">
                @csrf
                <div class="modal-body">
                    <label>Вопрос(ru): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="question" required>
                    </div>
                    <label>Вопрос(en): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="question_en">
                    </div>
                    <label>Вопрос(uz): </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="question_uz">
                    </div>

                    <label>Ответ(ru): </label>
                    <div class="form-group">
                        <textarea name="answer" rows="5" class="form-control" required></textarea>
                    </div>
                    <label>Ответ(en): </label>
                    <div class="form-group">
                        <textarea name="answer_en" rows="5" class="form-control"></textarea>
                    </div>
                    <label>Ответ(uz): </label>
                    <div class="form-group">
                        <textarea name="answer_uz" rows="5" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="subject_id" value="{{$subject->id}}">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add addFaqForm Modal -->