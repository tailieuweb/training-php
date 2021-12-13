const mix = require('laravel-mix');
const path = require('path');
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
 mix.disableNotifications();
 mix.disableSuccessNotifications();
mix.js('resources/js/app.js', 'public/js')
    .vue({version : 3})
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]).webpackConfig({
        resolve: {
            alias: {
                SrcComponent : path.resolve(__dirname,'resources/js/'),
                Image : path.resolve(__dirname,'public/images/')
            },

        }
    }).sourceMaps();
