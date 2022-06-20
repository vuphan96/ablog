<?php

use App\Http\Controllers\Ablog\AblogAboutController;
use App\Http\Controllers\Ablog\AblogBlogcontroller;
use App\Http\Controllers\Ablog\AblogContactController;
use App\Http\Controllers\Ablog\AblogDetailController;
use App\Http\Controllers\Ablog\AblogIndexController;
use App\Http\Controllers\Ablog\AblogRepController;
use App\Http\Controllers\Ablog\AblogSearchController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCatController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\AuthChangePassController;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\Auth\AuthLoginpublicController;
use GuzzleHttp\Middleware;
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
Route::pattern('slug','(.*)');
Route::pattern('id','[0-9]*');

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/')->group(function(){
    Route::get('/',[AblogIndexController::class,'index'])->name('Ablog.index.index');
    Route::get('/gioi-thieu',[AblogAboutController::class,'about'])->name('Ablog.about.about');
    Route::get('/lien-he',[AblogContactController::class,'contact'])->name('Ablog.contact.contact');
    Route::post('/lien-he',[AblogContactController::class,'postcontact'])->name('Ablog.contact.postcontact');

    Route::prefix('/')->group(function(){
        Route::get('/{slug}-{id}', [AblogBlogcontroller::class,'blog'])->name('Ablog.blog.blog');
        Route::get('/{slug}-{id}.html', [AblogBlogcontroller::class,'detail'])->name('Ablog.blog.detail');
        Route::post('/comment',[AblogBlogcontroller::class,'comment'])->name('Ablog.blog.comment');
        // Route::get('/repcomment',[AblogBlogcontroller::class,'repcomment'])->name('Ablog.blog.repcomment');

    });
    Route::prefix('/')->group(function(){
        Route::get('/dang-nhap',[AuthLoginpublicController::class,'login'])->name('Ablog.auth.login');
        Route::post('/dang-nhap',[AuthLoginpublicController::class,'postlogin'])->name('Ablog.auth.postlogin');
        Route::get('/dang-ky',[AuthLoginpublicController::class,'register'])->name('Ablog.auth.register');
        Route::post('/dang-ky',[AuthLoginpublicController::class,'postregister'])->name('Ablog.auth.postregister');
        Route::get('/dang-xuat',[AuthLoginpublicController::class,'logout'])->name('Ablog.auth.logout');
    });
    // Route::post('/search',[AblogSearchController::class,'search'])->name('Ablog.search.search');


});
// ->middleware('auth')
Route::prefix('/Admin')->middleware('loginlook')->group(function(){
    Route::get('/',[AdminIndexController::class,'index'])->name('Admin.index.index');

    Route::prefix('/cat')->group(function(){
        Route::get('/',[AdminCatController::class,'index'])->name('Admin.cat.index');
        Route::get('/add',[AdminCatController::class,'add'])->name('Admin.cat.add')->middleware('Role:admin');
        Route::post('/add',[AdminCatController::class,'postadd'])->name('Admin.cat.postadd');
        Route::get('/edit/{id}',[AdminCatController::class,'edit'])->name('Admin.cat.edit')->middleware('Role:admin');
        Route::post('/edit/{id}',[AdminCatController::class,'postedit'])->name('Admin.cat.postedit');
        Route::get('/del/{id}',[AdminCatController::class,'del'])->name('Admin.cat.del')->middleware('Role:admin');
    });
    Route::prefix('/about')->group(function(){
        Route::get('/',[AdminAboutController::class,'index'])->name('Admin.about.index');
        Route::get('/add',[AdminAboutController::class,'add'])->name('Admin.about.add');
        Route::post('/add',[AdminAboutController::class,'postadd'])->name('Admin.about.postadd');
        Route::get('/edit/{id}',[AdminAboutController::class,'edit'])->name('Admin.about.edit');
        Route::post('/edit/{id}',[AdminAboutController::class,'postedit'])->name('Admin.about.postedit');
        Route::get('/del/{id}',[AdminAboutController::class,'del'])->name('Admin.about.del');
    });
    Route::prefix('/blog')->group(function(){
        Route::get('/',[AdminBlogController::class,'index'])->name('Admin.blog.index');
        Route::get('/add',[AdminBlogController::class,'add'])->name('Admin.blog.add');
        Route::post('/add',[AdminBlogController::class,'postadd'])->name('Admin.blog.postadd');
        Route::get('/edit/{id}',[AdminBlogController::class,'edit'])->name('Admin.blog.edit');
        Route::post('/edit/{id}',[AdminBlogController::class,'postedit'])->name('Admin.blog.postedit');
        Route::get('/del/{id}',[AdminBlogController::class,'del'])->name('Admin.blog.del');
    });
    Route::prefix('/user')->group(function(){
        Route::get('/',[AdminUserController::class,'index'])->name('Admin.user.index');
        Route::get('/add',[AdminUserController::class,'add'])->name('Admin.user.add')->middleware('Role:admin|mod');
        Route::post('/add',[AdminUserController::class,'postadd'])->name('Admin.user.postadd');
        Route::get('/edit/{id}',[AdminUserController::class,'edit'])->name('Admin.user.edit')->middleware('Role:admin|mod');
        Route::post('/edit/{id}',[AdminUserController::class,'postedit'])->name('Admin.user.postedit');
        Route::get('/active/{id}',[AdminUserController::class,'active'])->name('Admin.user.active')->middleware('Role:admin|mod');
        Route::post('/active/{id}',[AdminUserController::class,'postactive'])->name('Admin.user.postactive');
        Route::get('/del/{id}',[AdminUserController::class,'del'])->name('Admin.user.del')->middleware('Role:admin|mod');
    });
    Route::prefix('/contact')->group(function(){
        Route::get('/',[AdminContactController::class,'index'])->name('Admin.contact.index');
        Route::get('/del/{id}',[AdminContactController::class,'del'])->name('Admin.contact.del');
    });
});
Route::prefix('/')->group(function(){
    Route::get('/login',[AuthLoginController::class,'login'])->name('Admin.auth.login')->middleware('checklogout');
    Route::post('/login',[AuthLoginController::class,'postlogin'])->name('Admin.auth.postlogin');
    Route::get('/logout',[AuthLoginController::class,'logout'])->name('Admin.auth.logout');
    Route::get('/email',[AuthLoginController::class,'getemail'])->name('Admin.auth.email');
    Route::post('/email',[AuthLoginController::class,'postemail'])->name('Admin.auth.postemail');
    Route::get('/warning',[AuthLoginController::class,'warning'])->name('Admin.auth.warning');
});
Route::prefix('/')->group(function(){
    Route::get('/changepass/{mail}',[AuthChangePassController::class,'changePass'])->name('Admin.auth.changePass');
    Route::post('/changepass/{mail}',[AuthChangePassController::class,'postchangePass'])->name('Admin.auth.postchangePass');

});


