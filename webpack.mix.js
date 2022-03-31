
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

mix.js('resources/js/web/app.js', 'public/js')
    .js('resources/js/admin/admin.js' , 'public/js/admin')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
    ]);

mix.js('node_modules/@fortawesome/fontawesome-free/js/all.js','public/js/FontAwesome')
    .js('node_modules/@fortawesome/fontawesome-free/js/fontawesome.js','public/js/FontAwesome')
    .js('node_modules/@fortawesome/fontawesome-free/js/solid.js','public/js/FontAwesome');
