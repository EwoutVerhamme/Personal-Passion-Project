const mix = require('laravel-mix');
const SWPrecacheWebpackPlugin = require('sw-precache-webpack-plugin')

new SWPrecacheWebpackPlugin({
    cacheId: 'my-pwa-vue-app',
    filename: 'service-worker-cache.js',
    staticFileGlobs: ['dist/**/*.{js,css}', '/'],
    minify: true,
    stripPrefix: 'dist/',
    dontCacheBustUrlsMatching: /\.\w{6}\./
  })

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').vue();
