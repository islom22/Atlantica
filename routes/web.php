<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    return view('index');
});




Route::middleware(['auth'])->prefix('admin')->group(function () {    
    Route::post('upload-image', [HomeController::class, 'uploadImage'])->name('upload-image');
    Route::post('upload-image', [HomeController::class, 'uploadImage'])->name('upload-image');
    Route::resource('langs', LangController::class);
    Route::post('/translations/search', [TranslationController::class, 'search'])->name('translation.search');
    Route::resource('translations', TranslationController::class);
    Route::resource('banners', BannerController::class);
    Route::post('/delete-image-banners', [BannerController::class, 'delete_image_banners'])->name('delete-image-banners');
    Route::post('upload-banners-image', [BannerController::class, 'upload_banners_image'])->name('upload-banners-image');
    Route::resource('news', NewController::class);
    Route::post('/delete-image-news', [NewController::class, 'delete_image_news'])->name('delete-image-news');
    Route::post('upload-news-image', [NewController::class, 'upload_news_image'])->name('upload-news-image');
    Route::resource('abouts', AboutController::class);
    Route::post('/delete-image-about', [AboutController::class, 'delete_image_about'])->name('delete-image-about');
    Route::post('upload-about-image', [AboutController::class, 'upload_about_image'])->name('upload-about-image');  
    Route::resource('projects',ProjectController::class);
    Route::post('/delete-image', [ProjectController::class, 'deleteImage'])->name('delete-image');
    Route::post('upload-service-image', [ProjectController::class, 'uploadImage'])->name('upload-service-image');
    Route::resource('applications', ConnectController::class);
    Route::resource('partners',PartnerController::class);
    Route::post('/delete-image-partner', [PartnerController::class, 'delete_image_partner'])->name('delete-image-partner');
    Route::post('upload-partner-image', [PartnerController::class, 'upload_partner_image'])->name('upload-partner-image');
    Route::resource('comments',CommentController::class);
    Route::post('/delete-image-comment', [CommentController::class, 'delete_image_comment'])->name('delete-image-comment');
    Route::post('upload-comment-image', [CommentController::class, 'upload_comment_image'])->name('upload-comment-image');
    Route::resource('querys',QueryController::class);
    Route::resource('mains',MainController::class);

});
Auth::routes();

Route::group(['prefix'  =>  App\Http\Middleware\LocaleMiddleware::getLocale(), 'middleware' => 'locale'], function(){
Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/news/{id}', [WebController::class, 'news'])->name('news');
Route::get('/news_inner', [WebController::class, 'news_inner'])->name('news_inner');
Route::get('/projects/{id}', [WebController::class, 'projects'])->name('projects');
Route::get('/signup', [WebController::class, 'signup'])->name('signup');
Route::get('/registration', [WebController::class, 'registration'])->name('registration');
Route::get('/connect', [WebController::class, 'connect'])->name('connect');
Route::post('/order', [WebController::class, 'order'])->name('order');
Route::get('/sendmail', [MailController::class, 'index']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('setlocale/{lang}', function ($lang) {
    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);
    
    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != App\Http\Middleware\LocaleMiddleware::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }

    //формируем полный URL
    // dd($lang);
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }

    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');