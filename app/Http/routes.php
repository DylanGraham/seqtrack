<?php

/*
 * Routes direct user web browser URL to the correct controller to
 * complete the request
 */

/* View composer option. Currently using @inject into
 * partials/form.blade.php
 */
//View::composer('indexes', function($view) {
//    $view->with('indexes', app('App\Indexes'));
//});

Route::get('/', 'PageController@index');
Route::resource('samples', 'SamplesController');
Route::resource('batches', 'BatchesController');

// set a runs status as built, successful or failed
Route::post('runs/setStatus', 'RunsController@setStatus');

// view a list of runs
Route::resource('runs', 'RunsController');

// Resources to view or add items to drop down lists
Route::resource('chemistry', 'ChemistryController');
Route::resource('project_groups', 'ProjectGroupController');
Route::resource('adaptor', 'AdaptorController');
Route::resource('assay', 'AssayController');
Route::resource('workflow', 'WorkFlowController');
Route::resource('instrument', 'InstrumentController');
Route::resource('application', 'ApplicationController');


// to create a run : SampleRuns first collects batches with samples to include
// then runDetails adds the common required header fields and carries out final server side validation
Route::resource('sampleRuns', 'SampleRunController');
Route::resource('runDetails', 'RunDetailsController');

// Display a list of batches that have samples with runs remaining
Route::get('/batchesRunsRemaining', 'SampleRunController@batchesRunsRemaining');

// Display a list of samples with runs remaining
Route::get('/samplesRunsRemaining', 'SampleRunController@samplesRunsRemaining');

// To close registrations
Route::get('/auth/register', 'PageController@closed');

// Display an "about" website information page
Route::resource('about', 'AboutController');

Route::controllers([
    'auth'      => 'Auth\AuthController',
    'password'  => 'Auth\PasswordController',
]);

// import samples into a existing batch
Route::post('import/validateFile', 'ImportSampleController@validateFile');
Route::resource('import', 'ImportSampleController');
