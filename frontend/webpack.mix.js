const mix = require('laravel-mix');

require('vuetifyjs-mix-extension');

mix.js('src/js/app.js', 'public/js').vuetify('vuetify-loader')
   .sass('src/sass/app.scss', 'public/css')
   .setPublicPath('public')
   .browserSync({
      proxy: 'e-commerce.test',
      files: ['public/**/index.html', 'public/css/**/app.css', 'public/js/**/app.js']
   });