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

Route::get('/exercises', 'ExerciseController@index')
    ->name('exercises.index');

Route::get('/exercises/new', 'ExerciseController@create')
    ->name('exercises.create');

Route::post('/exercises/', 'ExerciseController@store');

Route::get('/exercises/{exercise}', 'ExerciseController@show')
    ->name('exercises.show');

Route::get('/exercises/{exercise}/edit', 'ExerciseController@edit')
    ->name('exercises.edit');

Route::put('/exercises/{exercise}', 'ExerciseController@update');

Route::delete('/exercises/{exercise}', 'ExerciseController@destroy')
    ->name('exercises.destroy');