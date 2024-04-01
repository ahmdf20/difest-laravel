const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            transparent: 'transparent',
            'biru-dark-100': '#0A4696',
            'biru-dark-200': '#0B2F62',
            'dark-mode-difest': '#4F4675',
            'light-mode-difest': '#F9EC83',
            'hijau-difest': '#27D1D1',
            'hijau-difest-hover': '#20C2C2',
            'kuning-difest': '#FFFFA0',
            // 'biru-bg-difest': '#1a5073',
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('daisyui')],
};
