let mix = require('laravel-mix');

require('laravel-mix-tailwind');


mix
    .ts('src/js/app.ts', 'main.js')
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