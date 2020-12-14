<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$company->name}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{route('admin.company.update', $company->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Наименование организации</label>
                                            <input value="{{$company->name}}" type="text" id="first-name-column"
                                                   class="form-control" placeholder="Наименование" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="working">Режим работы</label>
                                            <input value="{{$company->working}}" type="text" id="working"
                                                   class="form-control" placeholder="Режим работы" name="working">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="phone-1-column">Телефон 1</label>
                                            <input value="{{$company->phone1}}" type="text" id="phone-1-column"
                                                   class="form-control" placeholder="Телефон 1" name="phone1">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone-2-column">Телефон 2</label>
                                            <input value="{{$company->phone2}}" type="text" id="phone-2-column"
                                                   class="form-control" placeholder="Телефон 2" name="phone2">
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <fieldset class="form-group">
                                            <label for="basicTextarea">Адрес</label>
                                            <textarea name="address" class="form-control" id="basicTextarea" rows="4"
                                                      placeholder="Адрес">{{$company->address}}</textarea>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6 col-12">


                                        <div class="form-group">
                                            <label for="email-column">Эл.почта</label>
                                            <input value="{{$company->email}}" type="email" id="email-column"
                                                   class="form-control" placeholder="Эл.почта" name="email">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">


                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Сохранить</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Отменить</button>
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