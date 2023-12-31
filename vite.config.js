import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// let $ = require('jquery');
// window.$ = window.jQuery = $;
// import $ from 'jquery';
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
