<div class="row match-height">
    @foreach($books as $book)
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 id="book-name" class="card-title text-uppercase">{{$book->name}}</h4>
                </div>
                <div class="card-content">
                    <div class="text-center">
                        <img class="img-fluid" src="{{asset($path)}}/{{$book->image}}">
                    </div>
                    <div class="card-body">
                        <h4 id="book-author">{{$book->author}}</h4>
                        <p id="book-house" class="text-bold-600">{{$book->publishing_house}}</p>
                        <p id="book-desc" class="card-text">{{$book->description}}</p>
                    </div>
                </div>
                <div class="card-footer text-muted">
                   {{$book->file_type}} {{$book->size}}Mb

                    <button title="Редактировать" data-id="{{$book->id}}" type="button"
                            class="btn btn-icon btn-primary ml-1 waves-effect waves-light"
                            data-toggle="modal" data-target="#editBookForm">
                        <i class="feather icon-edit"></i>
                    </button>
                    <button title="Удалить" data-id="{{$book->id}}" type="button"
                            class="btn btn-icon btn-danger ml-1 waves-effect waves-light"
                            data-toggle="modal" data-target="#deleteBookForm">
                        <i class="feather icon-trash-2"></i>
                    </button>

                </div>
            </div>
        </div>
    @endforeach
</div>

<button type="button" title="Добавить" class="btn  btn-icon btn-success mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#addBookForm">
    <i class="feather icon-plus-square"></i> Добавить
</button>

<!-- Edit Book Modal -->
<div class="modal fade text-left" id="editBookForm" tabindex="-1" role="dialog"
     aria-labelledby="editBookFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editBookFormLabel">Редактирование книги</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.library.update',$book->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body ">
                    <div class="row">
                    <div class="col-md-5 m-auto">
                        <img class="card-img-top img-fluid" src=""/>
                    </div>
                    <div class="col-md-7 m-auto">
                        <label>Картинка: </label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <small class="text-muted">Если не надо менять картинку, оставьте это поле пустым</small>
                        </div>
                        <label>Название(ru): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Название" class="form-control" name="name" value="{{$book->name}}">
                        </div>
                        <label>Название(en): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Название" class="form-control" name="name_en" value="{{$book->name_en}}">
                        </div>
                        <label>Название(uz): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Название" class="form-control" name="name_uz" value="{{$book->name_uz}}">
                        </div>
                        <label>Автор(ru): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Автор" class="form-control" name="author" value="{{$book->author}}">
                        </div>
                        <label>Автор(en): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Автор" class="form-control" name="author_en" value="{{$book->author_en}}">
                        </div>
                        <label>Автор(uz): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Автор" class="form-control" name="author_uz" value="{{$book->author_uz}}">
                        </div>
                    </div>
                    </div>

                    <label>Издательство(ru): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Издательство" class="form-control" name="publishing_house" value="{{$book->publishing_house}}">
                    </div>
                    <label>Издательство(en): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Издательство" class="form-control" name="publishing_house_en" value="{{$book->publishing_house_en}}">
                    </div>
                    <label>Издательство(uz): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Издательство" class="form-control" name="publishing_house_uz" value="{{$book->publishing_house_uz}}">
                    </div>

                    <label for="description">Описание(ru): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="description" rows="5">{{$book->description}}</textarea>
                    </div>
                    <label for="description_en">Описание(en): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="description_en" id="description_uz" rows="5">{{$book->description_en}}</textarea>
                    </div>
                    <label for="description_uz">Описание(uz): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="description_uz" id="description_en" rows="5">{{$book->description_uz}}</textarea>
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
<!-- End Edit Book Modal -->

<!-- Add Book Modal -->
<div class="modal fade text-left" id="addBookForm" tabindex="-1" role="dialog"
     aria-labelledby="addBookFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addBookFormLabel">Добавление книги</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.library.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <label>Название(ru): </label>
                            <div class="form-group">
                                <input type="text" placeholder="Название" class="form-control" name="name" required>
                            </div>
                            <label>Название(en): </label>
                            <div class="form-group">
                                <input type="text" placeholder="Название" class="form-control" name="name_en">
                            </div>
                            <label>Название(uz): </label>
                            <div class="form-group">
                                <input type="text" placeholder="Название" class="form-control" name="name_uz">
                            </div>
                            <label>Автор(ru): </label>
                            <div class="form-group">
                                <input type="text" placeholder="Автор" class="form-control" name="author" required>
                            </div>
                            <label>Автор(en): </label>
                            <div class="form-group">
                                <input type="text" placeholder="Автор" class="form-control" name="author_en">
                            </div>
                            <label>Автор(uz): </label>
                            <div class="form-group">
                                <input type="text" placeholder="Автор" class="form-control" name="author_uz">
                            </div>
                        </div>

                        <div class="col-md-6 m-auto">
                            <label>Картинка: </label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image" accept="image/*" required>
                            </div>
                            <label>Файл: </label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="file" accept="*" required>
                            </div>
                        </div>

                    </div>

                    <label>Издательство(ru): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Издательство" class="form-control" name="publishing_house" required>
                    </div>
                    <label>Издательство(en): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Издательство" class="form-control" name="publishing_house_en">
                    </div>
                    <label>Издательство(uz): </label>
                    <div class="form-group">
                        <input type="text" placeholder="Издательство" class="form-control" name="publishing_house_uz">
                    </div>

                    <label for="description">Описание(ru): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
                    </div>
                    <label for="description">Описание(en): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="description_en" id="description_en" rows="5"></textarea>
                    </div>
                    <label for="description">Описание(uz): </label>
                    <div class="form-group">
                        <textarea class="form-control" name="description_uz" id="description_uz" rows="5"></textarea>
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
<!-- Add Edit Book Modal -->

<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteBookForm" tabindex="-1" role="dialog" aria-labelledby="deleteBookFormLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteBookFormLabel1">Удаление книги</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Вы действительно хотите удалить книгу
                    <hr><span class="text-bold-700">Книга</span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('admin.library.destroy',$book->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Да удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>