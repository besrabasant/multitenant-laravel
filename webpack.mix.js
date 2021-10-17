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


mix.ts('resources/js/App/app.ts', 'public/js/app.js', {
    transpileOnly: true
});

mix.ts('resources/js/Main/app.ts', 'public/js/main.js', {
    transpileOnly: true
}).vue({version: 3});

mix.sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/main.scss', 'public/css/main.css')
    .options({
        processCssUrls: false
    });

mix.sourceMaps(false, 'source-map');

mix.webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}

