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
Route::get('/home', 'HomeController@index');
Route::get('/','PagesController@index')->middleware('auth');
// Route::get('/student','PagesController@student')->middleware('auth');
// Route::get('/teacher','PagesController@teacher')->middleware('auth');
// Route::get('/lecture','PagesController@lecture')->middleware('auth');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
  Route::resource('/student','StudentsController');
    Route::resource('/course','CoursesController');
    Route::get('/student/course/create/{student}','StudentCourseController@create');
    Route::post('/student/course/{course}','StudentCourseController@store');
    Route::resource('/teacher','TeachersController');
    Route::resource('/semester','SemestersController');
    Route::resource('/exam','ExamsController');

});
