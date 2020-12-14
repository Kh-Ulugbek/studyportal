<!-- Statistics card section start -->
<section id="statistics-card">
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-at-sign text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$subscribers_cnt}}</h2>
                    <p class="mb-0">Подписчики</p>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-1" data-values="{{$subscribers_data}}"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-success p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-success font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$users_cnt}}</h2>
                    <p class="mb-0">Пользователи</p>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-2" data-values="{{$users_data}}"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="fa fa-university text-danger font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$university_cnt}}</h2>
                    <p class="mb-0">Университеты</p>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-3" data-values="{{$university_data}}"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-map text-warning font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$country_cnt}}</h2>
                    <p class="mb-0">Страны</p>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-4" data-values="{{$country_data}}"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700">{{$book_cnt}}</h2>
                        <p class="mb-0">Книги</p>
                    </div>
                    <div class="avatar bg-rgba-primary p-50">
                        <div class="avatar-content">
                            <i class="feather icon-book text-primary font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-5" data-values="{{$book_data}}"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700">{{$news_cnt}}</h2>
                        <p class="mb-0">Новости</p>
                    </div>
                    <div class="avatar bg-rgba-success p-50">
                        <div class="avatar-content">
                            <i class="feather icon-cast text-success font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-6" data-values="{{$news_data}}"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700">{{$post_cnt}}</h2>
                        <p class="mb-0">Посты</p>
                    </div>
                    <div class="avatar bg-rgba-warning p-50">
                        <div class="avatar-content">
                            <i class="feather icon-mail text-warning font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div id="line-area-chart-7" data-values="{{$post_data}}"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Statistics Card section end-->
