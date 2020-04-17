<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'TaskController@index')->name('home');
Route::post('/TaskCreate', 'TaskController@create')->name('create-task');
Route::get('/TaskDelete/{id}', 'TaskController@delete')->name('delete-task');
Route::get('/TaskUpdate/{id}', 'TaskController@update')->name('update-task');
Route::post('/TaskUpdate/', 'TaskController@edit')->name('edit-task');
