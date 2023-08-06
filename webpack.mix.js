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
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/system/system.scss', 'public/css/system')
    .sass('resources/sass/public-part/public.scss', 'public/css/public')

    .js('resources/js/system/system.js', 'public/js/system.js')
    .js('resources/js/public-part/public.js', 'public/js/public.js')
    .js('resources/js/system/live/live.js', 'public/js/live.js')

    /* MQTT live messages from system to TV screen */
    .js('resources/js/mqtt/tv-script.js', 'public/js/mqtt/tv-script.js')
    .js('resources/js/mqtt/control-script.js', 'public/js/mqtt/control-script.js')
;
