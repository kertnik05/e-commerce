const mix = require('laravel-mix');

require('vuetifyjs-mix-extension');

mix.js('src/js/app.js', 'dist/js').vuetify('vuetify-loader')
   .sass('src/sass/app.scss', 'dist/css')
   .setPublicPath('dist');