<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

/**
 * Create category
 */
Route::post('category/create', 'CategoryController@create');

/**
 * Create task
 */
Route::post('task/create', 'TaskController@create');
/**
 * Update task
 */
Route::post('task/update/{id}', 'TaskController@update');
/**
 * Delete task
 */
Route::post('task/delete/{id}', 'TaskController@delete');
