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

use App\Http\Resources\User as UserResource;

Route::get('/user', function () {
    return new UserResource(Auth::user());
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/swagger', function () {
})->name('api_documentation');

Auth::routes();

// temp redirect on logged

Route::get('/home', function () {
    return redirect()->to('/admin');
});

// prefix admin routes with
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/{any_path}', 'HomeController@index');
});
