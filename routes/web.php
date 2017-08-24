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
Route::post('file','FileController@storefile')->name('upload.file')->middleware('auth');
Route::get('file/show','FileController@showFile')->name('upload.showFile')->middleware('auth');
Route::get('file/{file_id}/delete', 'FileController@deleteFile');

Route::get('category','CategoryController@ShowCategory')->name('category.categoryHome');
Route::post('category','CategoryController@StoreCategory')->name('category.categoryHome');
Route::get('category/show','CategoryController@ShowListCategory')->name('category.categoryShow');

Route::get('category/delete', 'CategoryController@IndexCategory')->name('category.categoryDelete');
Route::post('category/delete', 'CategoryController@DeleteCategory')->name('category.categoryDelete');