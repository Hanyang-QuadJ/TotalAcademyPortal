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
    Route::get('/student/course/edit/{student}/{course}','StudentCourseController@edit');
    Route::post('/student/course/{course}','StudentCourseController@store');
    Route::delete('/student/course/{student}/{course}','StudentCourseController@destroy');
    Route::put('/student/course/update/{student}/{course}','StudentCourseController@update');
    Route::resource('/teacher','TeachersController');
    Route::resource('/semester','SemestersController');
    Route::resource('/exam','ExamsController');

    //StudentCourseController (학생 자세히 보기에서 강좌추가, 수강료 crud)
    Route::post('/student/course/{course}','StudentCourseController@store');
    Route::delete('/student/course/{student}/{course}','StudentCourseController@destroy');
    Route::PUT('/student/course/{student}/{course}','StudentCourseController@update');
    Route::get('/student/course/create/{student}','StudentCourseController@create');
    Route::get('/student/course/edit/{student}/{course}','StudentCourseController@edit');

    //CourseStudentController (강좌 상세히 보기에서 학생추가, 수강료 crud)
    Route::get('/course/student/create/{course}','CourseStudentController@create');
    Route::post('/course/student/{course}','CourseStudentController@store');


});
