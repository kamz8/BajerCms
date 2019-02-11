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
//import 'bootstrap';

// App
mix.js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css')
  .browserSync('localhost:8000')

mix.autoload({
  'jquery': ['$', 'window.jQuery', 'jQuery'],
  'vue': ['Vue','window.Vue'],
  'moment': ['moment','window.moment'],
})

mix.options({
  processCssUrls: false
});
