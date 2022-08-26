<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/register', 'App\Http\Controllers\UserController@create')->name('register.create');
Route::post('/register', 'App\Http\Controllers\UserController@store')->name('register.store');
Route::get('/login', 'App\Http\Controllers\UserController@loginForm')->name('login.create');
Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/list', 'App\Http\Controllers\TodoListController@show')->name('todo.show');
    Route::delete('/list/{id}', 'App\Http\Controllers\TodoListController@destroy')->name('todo.destroy');
    Route::get('/list/create', 'App\Http\Controllers\TodoListController@showCreate')->name('todo.showCreate');
    Route::post('/list/create', 'App\Http\Controllers\TodoListController@create')->name('todo.create');
    Route::get('/list/{id}/edit', 'App\Http\Controllers\TodoListController@edit')->name('todo.edit');
    Route::put('/list/{id}', 'App\Http\Controllers\TodoListController@update')->name('todo.update');



    Route::get('/todo/{id}/task','App\Http\Controllers\TaskListController@show')->name('task.show');
    Route::delete('/task/{id}', 'App\Http\Controllers\TaskListController@destroy')->name('task.destroy');
    Route::get('/task/create', 'App\Http\Controllers\TaskListController@showCreate')->name('task.showCreate');
    Route::post('/task/create', 'App\Http\Controllers\TaskListController@create')->name('task.create');
    Route::get('/task/{id}/edit', 'App\Http\Controllers\TaskListController@edit')->name('task.edit');
    Route::put('/task/{id}', 'App\Http\Controllers\TaskListController@update')->name('task.update');

    Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');
});



