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

// TODO: REMOVE ALL JS IN PUBLIC FOLDER
// mix.js('resources/js/app.js', 'public/js') // strictly no js
mix.postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/nordic.css', 'public/css');

mix.options({
    postCss: [
        require("tailwindcss")
    ]
});
