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

Route::get('/','PagesController@index')->middleware('auth');
Route::get('/student','PagesController@student')->middleware('auth');
Route::get('/teacher','PagesController@teacher')->middleware('auth');
Route::get('/lecture','PagesController@lecture')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('pages.students','StudentsController');

