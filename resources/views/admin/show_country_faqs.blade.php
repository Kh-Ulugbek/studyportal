<!--List group with tabs Starts-->
<section id="list-group-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$country->name}}</h4>

                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p>
                            Часто задаваемые вопросы:
                        </p>
                        <div class="row mt-1">
                            <div class="col-md-5 col-sm-12">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <ul class="list-group">
                                        @foreach($faqs as $cnt=>$faq)
                                            <li class="list-group-item d-flex">
                                                <a class="list-group-item list-group-item-action @if($cnt==0)active @endif"
                                                   id="list-home-{{$cnt+1}}"
                                                   data-toggle="list" href="#list-{{$cnt+1}}"
                                                   role="tab" aria-controls="list-{{$cnt+1}}">
                                                    {{$faq->question}}
                                                </a>
                                                <a href="#" onclick="event.preventDefault();
                                                        document.getElementById('delete-faq-{{$faq->id}}').submit();"
                                                   title="Удалить" class="todo-item-info danger"><i class="feather icon-trash-2 ml-1"></i></a>
                                                <form id="delete-faq-{{$faq->id}}" action="{{route('admin.country-faqs.destroy', $faq->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <button type="button" title="Добавить" class="btn  btn-icon btn-success mt-1 waves-effect waves-light" data-toggle="modal" data-target="#addCountryFaqForm">
                                    <i class="feather icon-plus-square"></i> Добавить вопрос
                                </button>
                            </div>
                            <div class="col-md-7 col-sm-12 mt-1">
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach($faqs as $cnt=>$faq)
                                    <div class="tab-pane fade show @if($cnt==0)active @endif" id="list-{{$cnt+1}}" role="tabpanel" aria-labelledby="list-home-{{$cnt+1}}">
                                        @foreach($faq->answers as $answer)
                                            <form action="{{route('admin.faq-answer.destroy', $answer->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Удалить" type="submit" class="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </form>
                                            <p>
                                                {{$answer->answer}}
                                            </p>
                                        @endforeach
                                            <button type="button" title="Добавить"
                                                    data-id="{{$faq->id}}"
                                                    class="btn  btn-icon btn-warning mt-1 waves-effect waves-light"
                                                    data-toggle="modal" data-target="#addFaqAnswerForm">
                                                <i class="feather icon-plus-square"></i> Добавить ответ
                                            </button>
                                    </div>

                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--List group with tabs Ends-->

<!-- Add CountryFaq Modal -->
<div class="modal fade text-left" id="addCountryFaqForm" tabindex="-1" role="dialog" aria-labelledby="addCountryFaqLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addCountryFaqLabel">Добавление нового вопроса</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.country-faqs.update', $country->id)}}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <label>Вопрос: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Вопрос" class="form-control" name="question" required>
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

@if (isset($faq))
<!-- Add CountryFaq Modal -->
<div class="modal fade text-left" id="addFaqAnswerForm" tabindex="-1" role="dialog" aria-labelledby="addFaqAnswerFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addFaqAnswerFormLabel">Добавление ответа на вопрос</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.faq-answer.store')}}">
                @csrf
                <div class="modal-body">
                    <label>Ответ: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Ответ но вопрос..." class="form-control" name="answer" required>
                    </div>
                    <input type="hidden" name="faq_id" value="{{$faq->id}}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endif