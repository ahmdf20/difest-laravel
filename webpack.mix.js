const mix = require('laravel-mix')

mix.js('resources/js/app.js', 'public/js')
.copy('node_modules/sweetalert2/dist/sweetalert2.all.js', 'public/js')
