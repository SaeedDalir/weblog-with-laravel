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

// mix.styles([
//     'resources/admin/css/font-awesome.min.css',
//     'resources/admin/dist/style.css',
//     'resources/admin/css/simple-line-icons.min.css',
//     'resources/admin/dist/style-custom.css',
// ], 'public/css/all-admin.css')
// mix.scripts([
//     'resources/admin/js/libs/jquery.min.js',
//     'resources/admin/js/libs/bootstrap.min.js',
//     'resources/admin/js/app.js',
//     'resources/admin/js/views/main.js',
//     'resources/admin/js/libs/pace.min.js',
//     'resources/admin/js/libs/Chart.min.js',
// ], 'public/js/all-admin.js')

mix.styles(['resources/admin/css/dropzone.min.css'],'public/css/dropzone.css')
mix.scripts(['resources/admin/js/dropzone.min.js'],'public/js/dropzone.js')

mix.styles([
    'resources/frontend/css/bootstrap.min.css',
    'resources/frontend/css/font-awesome.min.css',
    'resources/frontend/css/style.css',
], 'public/css/all.css')

mix.scripts([
    'resources/frontend/js/jquery.min.js',
    'resources/frontend/js/bootstrap.min.js',
    'resources/frontend/js/main.js',
], 'public/js/all.js')