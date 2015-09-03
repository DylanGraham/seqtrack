<?php

/* View composer option. Currently using @inject into
 * partials/form.blade.php
 */
//View::composer('indexes', function($view) {
//    $view->with('indexes', app('App\Indexes'));
//});

//Route::get('testing', 'IndexController@test');

Route::get('/', 'PageController@index');
Route::resource('samples', 'SamplesController');
Route::resource('batches', 'BatchesController');
Route::resource('runs', 'RunsController');

// To close registrations
//Route::get('/auth/register', 'PageController@closed');

Route::controllers([
    'auth'      => 'Auth\AuthController',
    'password'  => 'Auth\PasswordController',
]);
