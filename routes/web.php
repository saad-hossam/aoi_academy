<?php

use App\Mail\UserMessage;

use App\Http\Controllers\CertificateController;
use App\Models\Certificate;
use App\Models\Project;
// use App\Mail\UserMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;




use App\Http\Controllers\NewsController;

use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\VideoController;


use App\Http\Controllers\GallaryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubDepartmentController;

// use App\Http\Middleware\TrackVisitor;

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

Route::group(['prefix'=>'/admin/'], function () {
    Auth::routes();
});
Route::get('admin2/{page}', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/page_500', [AdminController::class, 'page_500']);
Route::get('/send_mail',function()
{
    Mail::to('salimeslam55@gmail.com')->send(new UserMessage('hello atico'));
});
// ,'middleware' => ['auth','admin']
Route::group(['prefix'=>'/admin/','middleware' => ['auth','admin']], function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/index', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);






    Route::resource('departments', DepartmentController::class);
    // Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    // Route::resource('gallaries', GallaryController::class);
    Route::resource('messages', MessageController::class);
    // Route::resource('abouts', AboutController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('sliders', SliderController::class);
    // Route::resource('histories', HistoryController::class);
    Route::resource('histories', HistoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('projects', ProjectController::class);
    Route::get('projects/{project}/images', [ProjectController::class, 'showImages'])->name('projects.showImages');
    Route::resource('news', NewsController::class);
    Route::resource('certificates', CertificateController::class);

    Route::resource('lecturers', LecturerController::class);

    Route::resource('videos', VideoController::class);



    // Route::post('/product_save_photos',  [ProductController::class, 'saveAttachmentPhotos'])->name('products.photo.store');

    // Route::resource('services', ServiceController::class);

});

Route::group(
    [

        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/',  [HomeController::class, 'index'])->name('home');

        Route::get('/contact-us',  [HomeController::class, 'contact'])->name('contact-us');
        Route::get('/services',  [HomeController::class, 'services'])->name('services_all');
        Route::get('/projects',  [HomeController::class, 'projects_all'])->name('projects_all');

        Route::get('/contact-us',  [ContactController::class, 'show'])->name('contact-us');
        Route::get('/about',  [HomeController::class, 'about'])->name('about');
        Route::get('/products', [HomeController::class, 'products'])->name('products');
        Route::get('/product/{id}', [HomeController::class, 'product_details'])->name('details');
        Route::get('/products/{departmentId?}', [HomeController::class, 'showProductsByDepartment'])->name('productsByDepartment');
        Route::get('/service', [HomeController::class,'services'])->name('services');
        Route::get('/service/{id}', [HomeController::class,'service_details'])->name('service_details');
        Route::get('/project/{id}', [HomeController::class,'project_details'])->name('project_details');
        Route::get('/projects/department/{department_id}', [HomeController::class, 'projects_by_department'])->name('projects.by_department');
Route::get('/news', [HomeController::class, 'news'])->name('front.news');
Route::get('/news/{slug}', [HomeController::class, 'showNews'])->name('front.news.show');

    }
);

