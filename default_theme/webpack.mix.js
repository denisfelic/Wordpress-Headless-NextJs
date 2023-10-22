let mix = require('laravel-mix');

require('laravel-mix-tailwind');


mix
    .js('src/js/app.js', 'main.js')
    .sass('src/scss/app.scss', 'style.css')
    .setPublicPath('').
    options({
    postCss: [require('tailwindcss')]
}).browserSync({
    proxy: 'localhost:8080',
    files: [
        './src/**/*.php',
        './template-parts/**/*.php',
        './*.php',
        './inc/**/*.php',
        './**/*.php',
        './inc/**/**/*.php',
        './**/**/*.php',
        './inc/*.php',
        './src/**/*.js',
        './src/**/*.scss',
        './src/**/*/.scss',
        'style.css',
        'main.js',
    ]
});

if (mix.inProduction()) {
    mix.version()
}