<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Route::middleware(['set_locale'])->group(function (){

    Route::get('/locale/{locale}', [App\Http\Controllers\IndexController::class, 'locale'])->name('locale')
        ->middleware('set_locale');

    Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

    Route::post('/callback', [App\Http\Controllers\IndexController::class, 'callback'])->name('callback');
    Route::post('/subscribe', [App\Http\Controllers\IndexController::class, 'subscribe'])->name('subscribe');
    Route::post('/message', [App\Http\Controllers\IndexController::class, 'message'])->name('message');
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('news', App\Http\Controllers\NewsController::class)->only(['index', 'show']);
    Route::get('country/{slug}',[App\Http\Controllers\IndexController::class, 'country'])->name('country.show');
    Route::get('country',[App\Http\Controllers\IndexController::class, 'country_index'])->name('country.index');
    Route::resource('university', App\Http\Controllers\UniversityController::class)->only(['index', 'show']);
    Route::resource('book', App\Http\Controllers\BookController::class)->only(['index']);
    Route::resource('library', App\Http\Controllers\LibraryController::class)->only(['sow', 'edit', 'index']);
    Route::get('library/{bookname}', [App\Http\Controllers\LibraryController::class, 'show'])->name('getBook');
    Route::get('library/books/{bookname}', [App\Http\Controllers\LibraryController::class, 'edit']);
    Route::get('contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::get('tourism', [App\Http\Controllers\TourismController::class, 'index'])->name('tourism.index');
    Route::get('tourism/{region}', [App\Http\Controllers\TourismController::class, 'region'])->name('tourism.region');

    Route::post('/save-name', [App\Http\Controllers\ProfileController::class, 'saveName'])->name('save_name');
    Route::post('save-avatar', [App\Http\Controllers\ProfileController::class, 'saveAvatar'])->name('save.avatar');
    Route::get('get-avatar/', [App\Http\Controllers\PageController::class, 'getAvatar'])->name('get.avatar');
    Route::get('get-useravatar/{id}', [App\Http\Controllers\PageController::class, 'getUserAvatar'])->name('get.useravatar');
    Route::get('university/faculties/{id}', [App\Http\Controllers\UniversityController::class, 'getFaculties'])->name('university.faculties');
    Route::post('delete-alert/{id}', [App\Http\Controllers\ProfileController::class, 'deleteAlert'])->name('delete.alert');
    Route::get('readall-alert', [App\Http\Controllers\ProfileController::class, 'readAllAlert'])->name('readall.alert');
    Route::get('read-alert/{id}', [App\Http\Controllers\ProfileController::class, 'readAlert'])->name('read.alert');
    Route::get('privacy', [App\Http\Controllers\ContactController::class, 'privacy'])->name('privacy');
    Route::get('bookmark/{id}', [App\Http\Controllers\ProfileController::class, 'addBookmark'])->name('add.bookmark');
    Route::get('bookmark/rem/{id}', [App\Http\Controllers\ProfileController::class, 'removeBookmark'])->name('remove.bookmark');
    Route::post('loadFile', [App\Http\Controllers\ProfileController::class, 'loadFile'])->name('load.file');
    Route::get('showFile/{id}', [App\Http\Controllers\ProfileController::class, 'showFile'])->name('show.file');
    Route::resource('article', App\Http\Controllers\ArticleController::class);
    Route::get('faqs',[App\Http\Controllers\IndexController::class, 'faqs'])->name('faqs.index');
    Route::post('search',[App\Http\Controllers\IndexController::class, 'search'])->name('search');
    Route::get('study-ambassador',[App\Http\Controllers\IndexController::class, 'ambassador'])->name('ambassador.index');
    Route::post('store-university',[App\Http\Controllers\ProfileController::class, 'storeUniversity'])->name('store.university');
    Route::get('ambassador/article/show/{id}',[App\Http\Controllers\PageController::class, 'articleShow'])->name('article.show.page');
    Route::get('checklist/checked/{id}',[App\Http\Controllers\ProfileController::class, 'checklistChecked'])->name('checklist.checked');
    Route::get('checklist/delete/{id}',[App\Http\Controllers\ProfileController::class, 'checklistDelete'])->name('checklist.delete');
    Route::post('upload/video',[App\Http\Controllers\ProfileController::class, 'uploadVideo'])->name('upload.video');
    Route::get('ambassador-posts',[App\Http\Controllers\IndexController::class, 'postList'])->name('post.list');
    Route::get('get-video/{id}', [App\Http\Controllers\PageController::class, 'getVideo'])->name('get.video');
    Route::get('video/byCountry/{slug?}', [App\Http\Controllers\PageController::class, 'videoByCountry'])->name('video.byCountry');
    Route::delete('review/delete/{id}',[App\Http\Controllers\ProfileController::class, 'deleteVideo'])->name('delete.video');
    Route::post('filter/result/',[App\Http\Controllers\PageController::class, 'filterResult'])->name('filter.result');

});


Route::get('/admin',function(){
    return view('admin.login');
} )->name('admin.login');


Auth::routes();

Route::prefix('admin')->name('admin.')->group( function () {
    Route::get('/index', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('company', App\Http\Controllers\Admin\CompanyController::class)->only(['update', 'index']);
    Route::resource('social-icons', App\Http\Controllers\Admin\SocialIconsController::class)->except(['create','show', 'edit']);
    Route::resource('slider', App\Http\Controllers\Admin\SliderController::class)->except(['create','show', 'edit']);
    Route::resource('advantage', App\Http\Controllers\Admin\AdvantageController::class)->except(['create','show', 'edit']);
    Route::resource('certificate', App\Http\Controllers\Admin\CertificateController::class)->except(['create','show', 'edit']);
    Route::resource('partner', App\Http\Controllers\Admin\PartnerController::class)->except('show');
    Route::resource('country', App\Http\Controllers\Admin\CountryController::class)->except(['create','show']);
    Route::resource('step', App\Http\Controllers\Admin\StepController::class)->only(['index', 'update', 'store', 'destroy']);
    Route::resource('track', App\Http\Controllers\Admin\globalTrackController::class)->only(['index', 'update']);
    Route::resource('elite', App\Http\Controllers\Admin\EliteController::class)->only(['index', 'update']);
    Route::resource('history', App\Http\Controllers\Admin\HistoryController::class)->only(['index', 'update']);
    Route::resource('footer', App\Http\Controllers\Admin\FooterController::class)->only(['index', 'update']);
    Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    Route::resource('image', App\Http\Controllers\Admin\ImageController::class)->only(['index', 'store', 'destroy']);
    Route::resource('country-faqs', App\Http\Controllers\Admin\CountryFaqController::class)->only(['show', 'destroy', 'update']);
    Route::resource('faq-answer', App\Http\Controllers\Admin\CountryAnswerController::class)->only(['store', 'destroy']);
    Route::resource('tourism', App\Http\Controllers\Admin\TourismController::class)->only(['index', 'update']);
    Route::resource('tourism-pages', App\Http\Controllers\Admin\TourismPagesController::class)->except(['create','show', 'edit']);
    Route::resource('tourism-places', App\Http\Controllers\Admin\PlaceController::class)->except(['index', 'create', 'edit']);
    Route::get('banners', [App\Http\Controllers\Admin\BannerController::class, 'banners'])->name('banners.index');
    Route::post('banner/{id}', [App\Http\Controllers\Admin\BannerController::class, 'change_banner'])->name('banner.change');
    Route::get('bg-images', [App\Http\Controllers\Admin\BannerController::class, 'images'])->name('images.index');
    Route::resource('library', App\Http\Controllers\Admin\LibraryController::class);
    Route::get('callbacks', [App\Http\Controllers\Admin\CallBackController::class, 'index'])->name('callbacks.index');
    Route::post('callbackRead/{id}', [App\Http\Controllers\Admin\CallBackController::class, 'callbackRead'])->name('callback.read');
    Route::get('subscribe', [App\Http\Controllers\Admin\SubscribeController::class, 'index'])->name('subscribe.index');
    Route::delete('subscribe/{id}', [App\Http\Controllers\Admin\SubscribeController::class, 'destroy'])->name('subscribe.destroy');
    Route::get('subscribe/read/{id}', [App\Http\Controllers\Admin\SubscribeController::class, 'subscribeRead'])->name('subscribe.read');
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('users/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::patch('users/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::post('users/security', [App\Http\Controllers\Admin\UserController::class, 'security'])->name('user.security');
    Route::get('messages', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('message.index');
    Route::post('messageRead/{id}', [App\Http\Controllers\Admin\MessageController::class, 'read'])->name('message.read');
    Route::delete('callback/{id}', [App\Http\Controllers\Admin\CallBackController::class, 'destroy'])->name('callback.destroy');
    Route::delete('message/{id}', [App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('message.destroy');
    Route::name('partner')->resource('partner/image', App\Http\Controllers\Admin\UniversityImageController::class)->only(['store', 'destroy']);
    Route::resource('faculties', App\Http\Controllers\Admin\FacultyController::class)->except(['create', 'show', 'edit']);
    Route::get('partner/faculties/{id}', [App\Http\Controllers\Admin\PartnerController::class, 'faculties'])->name('partner.faculties.index');
    Route::post('partner/faculty_attach/{id}', [App\Http\Controllers\Admin\PartnerController::class, 'facultyAttach'])->name('partner.faculty.attach');
    Route::post('partner/faculty_detach/{id}', [App\Http\Controllers\Admin\PartnerController::class, 'facultyDetach'])->name('partner.faculty.detach');
    Route::name('program')->resource('program/types', App\Http\Controllers\Admin\ProgramTypesController::class);
    Route::resource('programs', App\Http\Controllers\Admin\ProgramController::class)->only(['index', 'store', 'destroy']);
    Route::resource('alerts', App\Http\Controllers\Admin\AlertController::class);
    Route::resource('files', App\Http\Controllers\Admin\FileController::class);
    Route::resource('faqs', App\Http\Controllers\Admin\FAQController::class)->except('create', 'edit', 'update');
    Route::get('analytics', [App\Http\Controllers\Admin\HomeController::class, 'analytics'])->name('analytics.index');
    Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class)->only(['index', 'update', 'store', 'destroy']);
    Route::resource('article', App\Http\Controllers\Admin\ArticleController::class)->except('create', 'store');
    Route::post('article/published/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'publish'])->name('article.published');
    Route::resource('checklist', App\Http\Controllers\Admin\CheckListController::class)->only('index', 'store', 'destroy');
    Route::resource('review', App\Http\Controllers\Admin\ReviewController::class)->only('index', 'destroy');
});



