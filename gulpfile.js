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

    mix.sass([
      'app.scss',
    ], 'resources/assets/css');

    mix.styles([
      'libs/bootstrap-3-3-5.min.css',
      'libs/bootstrap-datetimepicker-4.css',
      'app.css'
    ]);

    mix.scripts([
      'libs/jquery-2.1.4.min.js',
      'libs/moment-with-locales-2-10-0.min.js',
      'libs/bootstrap-3-3-5.min.js',
      'libs/bootstrap-datetimepicker-4.js',
      'app.js'
    ]);

});
