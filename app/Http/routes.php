<?php

View::composer('indexes', function($view) {
    $view->with('indexes', app('App\Indexes'));
});

Route::get('/', 'PageController@index');
Route::resource('samples', 'SamplesController');
Route::resource('batches', 'BatchesController');

// To close registrations
//Route::get('/auth/register', 'PageController@closed');

Route::controllers([
    'auth'      => 'Auth\AuthController',
    'password'  => 'Auth\PasswordController',
]);
