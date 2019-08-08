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



Route::get('/kategori','KategoriController@index');

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::post('/yazi','YaziController@store');
    Route::get('/yazi/create','YaziController@create');

    Route::post('/kategori','KategoriController@store');

    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/yazi','YaziController@index');
Route::get('/yazi/{yazi}','YaziController@show');
