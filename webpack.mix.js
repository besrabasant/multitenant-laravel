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

mix.webpackConfig(require('./webpack.config'));

mix.ts('resources/js/App/app.ts', 'public/js/app.js');

mix.js('resources/js/Main/app.js', 'public/js/main.js').vue();

mix.sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/main.scss', 'public/css/main.css')
    .options({
        processCssUrls: false
    });

mix.sourceMaps(false, 'source-map');

if (mix.inProduction()) {
    mix.version();
}

