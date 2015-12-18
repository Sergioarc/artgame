var elixir = require('laravel-elixir');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

// CSS
elixir(function(mix) {
    mix.sass('app.scss')
        .sass('admin/sets/form.scss', 'public/css/admin/sets/form.css');
});

// FONTS
elixir(function(mix) {
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/css/fonts');
    mix.copy('node_modules/font-awesome/fonts', 'public/css/fonts');
});

// SCRIPTS
elixir(function(mix) {
    mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'public/js/bootstrap');
});