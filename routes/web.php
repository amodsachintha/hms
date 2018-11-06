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

Route::get('/test',function (){
   return view('test.test');
});


//Department
Route::get('/department/list','DepartmentController@index')->name('department.list');

Route::get('/department/create','DepartmentController@showCreate')->name('department.create.show');
Route::post('/department/create','DepartmentController@create')->name('department.create');

Route::get('/department/update/{id}','DepartmentController@showUpdate')->name('department.update.show');
Route::post('/department/update/{id}','DepartmentController@update')->name('department.update');

Route::get('department/delete/{id}','DepartmentController@delete')->name('department.delete');