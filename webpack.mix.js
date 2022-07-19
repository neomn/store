
const mix = require('laravel-mix');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/web/web.js', 'public/js/web')
    .js('resources/js/adminPanel/admin.js' , 'public/js/adminPanel')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
    ]);

mix.js('node_modules/@fortawesome/fontawesome-free/js/all.js','public/js/FontAwesome')
    .js('node_modules/@fortawesome/fontawesome-free/js/fontawesome.js','public/js/FontAwesome')
    .js('node_modules/@fortawesome/fontawesome-free/js/solid.js','public/js/FontAwesome');
