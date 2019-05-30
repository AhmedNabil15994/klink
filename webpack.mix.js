let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/front/js')

    .sass('resources/assets/sass/app.scss', 'public/front/css')
    .options({
        extractVueStyles: 'public/front/css/styles.css',
        processCssUrls: false,

    })
    .webpackConfig({
        
        output: {
            chunkFilename: `front/js/chunks/[name]${mix.config.inProduction ? '.[chunkhash].chunk.js' : '.chunk.js'}`,
            publicPath: '/',
        },
    });