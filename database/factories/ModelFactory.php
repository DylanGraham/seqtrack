<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Carbon\Carbon;

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'user_id' => str_random(4),
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Batch::class, function ($faker) {
    return [
        'user_id' => '1',  // factory(App\User::class)->create()->id,
        "batch_name"    =>  str_random(16),
        "project_group_id" => "1",
        "concentration" =>  "0.0",
        "volume"        =>  "0.0",
        "tube_bar_code" =>  "TBC",
        "tube_location" =>  "TL",
        "tape_station_length" =>  "0.0",
        "charge_code"   =>  "1111-11111-11-111",
        "created_at"    =>  Carbon::now(),
        "updated_at"    =>  Carbon::now(),
    ];
});

$factory->define(App\Sample::class, function ($faker) {
    return [
        'batch_id'=> $faker->numberBetween(2, 10),
        'sample_id' => str_random(12),
        'sample_id_suffix'=>'1',
        'plate'=>'plate1',
        'well'=>'well1',
        'i7_index_id'=>'193',
        'i5_index_id'=>'1',
        'description'=>'description1',
        'runs_remaining'=>'16',
        'instrument_lane'=>'8',
        'created_at'=>  Carbon::now(),
        'updated_at'=>Carbon::now(),
    ];
});
