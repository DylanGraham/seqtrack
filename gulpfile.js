var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
//    mix.phpUnit();

    mix.styles([
        'bootstrap.min.css',
    ]);

    mix.scripts([
        'jquery-2.1.4.min.js',
        'bootstrap.min.js',
        'custom.js',
    ]);

});
