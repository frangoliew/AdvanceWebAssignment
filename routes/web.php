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

Route::resource('/album','AlbumController');
Route::resource('/photo','PhotoController');
Route::get('/photo/delete/{photo}', 'PhotoController@destroy')->name('photo.destroy');
Route::get('/photo/create/{id}', 'PhotoController@create');

Route::get('/home', 'HomeController@index')->name('home');
