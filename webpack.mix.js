const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.setPublicPath('public'); mix.setResourceRoot('../');
mix.js('resources/js/app.js', 'public/js')
    .combine(['node_modules/material-icons/css/material-icons.min.css','node_modules/vuetify/dist/vuetify.min.css'], 'public/css/app.min.css');
