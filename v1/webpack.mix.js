// webpack.mix.js

let mix = require('laravel-mix');

mix.js('src/app.js', 'dist').setPublicPath('dist')
    .sass('resources/sass/app.scss', 'public/css');
