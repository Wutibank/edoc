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

Route::get('upload','UploadController@index');
Route::post('store','UploadController@store');
Route::get('show','UploadController@show');

Route::get('file','FileController@index')->name('upload.file')->middleware('auth');
//Route::get('file','FileController@showUploadForm')->name('upload.file');
Route::post('file','FileController@storefile')->name('upload.file')->middleware('auth');
Route::get('file/{file_id}/del', 'FileController@delFile');

Route::get('category','CategoryController@ShowCategory')->name('category.cate_home');
Route::post('category','CategoryController@StoreCategory')->name('category.cate_home');
Route::get('catedel', 'CategoryController@IndexCategory')->name('category.catedel');
Route::post('catedel', 'CategoryController@DeleteCategory')->name('category.catedel');