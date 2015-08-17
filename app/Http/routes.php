<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@index');
Route::get('/samples', 'SamplesController@index');
Route::post('/samples', 'SamplesController@store');
Route::get('/samples/create', 'SamplesController@create');
Route::get('/batches', 'BatchesController@index');
Route::get('/batches/create', 'BatchesController@create');
