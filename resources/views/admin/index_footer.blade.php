<div class="row">
    <div class="col-6">
        <div class="card text-white bg-gradient">
            <div class="card-header m-auto mb-1">
                <h4 class="card-title text-white text-uppercase">{{$footer->col1->title}}</h4>
            </div>
            <div class="card-body">
                <form class="form" action="{{route('admin.footer.update', 1)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" required class="form-control" name="title" value="{{$footer->col1->title}}">
                    </div>
                    <div class="row">

                        <div class="col-6">
                            <label>Наименование: </label>
                            @foreach($footer->col1->links as $key => $link)
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="{{$key}}Name" value="{{$link->name}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="col-6">
                            <label>Ссылка: </label>
                            @foreach($footer->col1->links as $key => $link)
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="{{$key}}Href" value="{{$link->href}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Сохранить</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Отменить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card text-white bg-gradient">
            <div class="card-header m-auto mb-1">
                <h4 class="card-title text-white text-uppercase">{{$footer->col2->title}}</h4>
            </div>
            <div class="card-body">
                <form class="form" action="{{route('admin.footer.update', 2)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" required class="form-control" name="title" value="{{$footer->col2->title}}">
                    </div>
                    <div class="row">

                        <div class="col-6">
                            <label>Наименование: </label>
                            @foreach($footer->col2->links as $key => $link)
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="{{$key}}Name" value="{{$link->name}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="col-6">
                            <label>Ссылка: </label>
                            @foreach($footer->col2->links as $key => $link)
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="{{$key}}Href" value="{{$link->href}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Сохранить</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Отменить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card text-white bg-gradient">
            <div class="card-header m-auto mb-1">
                <h4 class="card-title text-white text-uppercase">{{$footer->col3->title}}</h4>
            </div>
            <div class="card-body">
                <form class="form" action="{{route('admin.footer.update', 3)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" required class="form-control" name="title" value="{{$footer->col3->title}}">
                    </div>
                    <div class="row">

                        <div class="col-6">
                            <label>Наименование: </label>
                            @foreach($footer->col3->links as $key => $link)
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="{{$key}}Name" value="{{$link->name}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="col-6">
                            <label>Ссылка: </label>
                            @foreach($footer->col3->links as $key => $link)
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="{{$key}}Href" value="{{$link->href}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Сохранить</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Отменить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>