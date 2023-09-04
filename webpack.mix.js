
import $ from "jquery";
let mix = require('laravel-mix');

mix.js('src/app.js', 'dist').setPublicPath('dist');
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css');
mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
