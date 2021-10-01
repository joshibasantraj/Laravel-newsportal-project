<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VideoController;
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
Route::get('/',[FrontendController::class,'index'])->name('my-home');
Route::get('/news/{id}',[FrontendController::class,'news'])->name('rel_news');
Route::get('/news_details/{id}',[FrontendController::class,'news_details'])->name('news_details');

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin',function(){
        return view('admin.dashboard');
    });
    Route::resource('category',CategoryController::class);
    Route::resource('news',NewsController::class);
    Route::resource('gallery',GalleryController::class);
    Route::resource('video',VideoController::class);

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

