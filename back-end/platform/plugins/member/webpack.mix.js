let mix = require('laravel-mix');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix.js(source + '/resources/assets/js/app.js', dist + '/js').vue({ version: 2 });

mix
    .js(source + '/resources/assets/js/member-admin.js', dist + '/js')

    .sass(source + '/resources/assets/sass/member.scss', dist + '/css')
    .sass(source + '/resources/assets/sass/app.scss', dist + '/css')

    .copyDirectory(dist + '/js', source + '/public/js')
    .copyDirectory(dist + '/css', source + '/public/css');
