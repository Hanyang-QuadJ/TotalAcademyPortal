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
    Route::resource('/teacher','TeachersController');
    Route::resource('/semester','SemestersController');
    Route::resource('/exam','ExamsController');

    //StudentCourseController (학생 자세히 보기에서 강좌추가, 수강료 crud)
    Route::get('/student/course/create/{student}','StudentCourseController@create');
    Route::post('/student/course/{course}','StudentCourseController@store');
    Route::get('/student/course/edit/{student}/{course}','StudentCourseController@edit');
    Route::PUT('/student/course/{student}/{course}','StudentCourseController@update');
    Route::delete('/student/course/{student}/{course}','StudentCourseController@destroy');


    //StudentExamController (학생 자세히 보기에서 시험추가, 점수 crud)
    Route::get('/student/exam/create/{student}','StudentExamController@create');
    Route::post('/student/exam/{student}','StudentExamController@store');
    Route::get('/student/exam/edit/{student}/{exam}','StudentExamController@edit');
    Route::PUT('/student/exam/{student}/{exam}','StudentExamController@update');
    Route::delete('/student/exam/{student}/{exam}','StudentExamController@destroy');

    //CourseStudentController (강좌 상세히 보기에서 학생추가, 수강료 crud)
    Route::get('/course/student/create/{course}','CourseStudentController@create');
    Route::post('/course/student/{course}','CourseStudentController@store');
    Route::get('/course/student/edit/{course}/{student}','CourseStudentController@edit');
    Route::PUT('/course/student/{course}/{student}','CourseStudentController@update');
    Route::delete('/course/student/{course}/{student}','CourseStudentController@destroy');




});
