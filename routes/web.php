<?php

use App\Http\Controllers\Admin\CategoriesController;
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

Route::get('/politics', function () {
    return view('pages.politics');
});

Route::get('/sport', function () {
    return view('pages.sport');
});

Route::get('/technologies', function () {
    return view('pages.technologies');
});

Route::get('/world-news', function () {
    return view('pages.world-news');
});

Route::get('/uzb-news', function () {
    return view('pages.uzb-news');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin/')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('categories', 'CategoriesController', ['except' => ['show']]);
    Route::resource('products', 'ProductsController');
    Route::get('search', 'CategoriesController@search')->name('search');
    Route::get('searchProduct', 'ProductsController@search')->name('searchProduct');
    Route::get('control', function(){ return view('admin.index');})->name('control');
});
