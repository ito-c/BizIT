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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
         'public/css/admin.css',
         'public/css/adminSidebar.css',
         'public/css/auth.css',
         'public/css/common.css',
         'public/css/home.css',
         'public/css/post.css',
         'public/css/sidebar.css',
         'public/css/user.css',
         'public/css/welcome.css'
   ], 'public/css/all.css');