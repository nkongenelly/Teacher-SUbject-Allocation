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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'StudentController@index'); 
Route::get('/teachers', 'StudentController@index'); 

Route::post('/teachers', 'TeacherController@store'); 

Route::get('/allteachers', 'TeacherController@index'); 

Route::get('/teachers/edit/{id}', 'TeacherController@edit');

Route::patch('/allteachers/update/{id}', 'TeacherController@update');

Route::get('/teachers/delete/{id}', 'TeacherController@destroy');

Route::post('/search', 'TeacherController@search');

//comments

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
