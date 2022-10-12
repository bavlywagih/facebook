let mix = require('laravel-mix');

mix.minify("./resources/css/app.css", "./public/css/app.css");
mix.js("./resources/js/app.js", "./public/js/app.js");
