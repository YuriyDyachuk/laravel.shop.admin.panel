<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin route
Route::group(['middleware' => ['status', 'auth']], function () {
    $dropData = [
        'namespace' => 'Blog\Admin',
        'prefix'    => 'admin',
    ];

    Route::group($dropData, function () {
        Route::resource('index','MainController')
            ->names('blog.admin.index');
        Route::resource('orders', 'OrderController')
            ->names('blog.admin.orders');

    });

});

// Users Route
Route::get('user/index', 'Blog\User\MainController@index');

