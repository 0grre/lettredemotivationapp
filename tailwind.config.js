const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
        "./layouts/**/*.html",
        "./content/**/*.md",
        "./content/**/*.html",
        "./src/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            primary: colors.indigo,
            secondary: '#ecc94b',
            // ...
        }
    },

    plugins: [
        require('@tailwindcss/forms'),
        require("tailwind-gradient-mask-image"),
        require('flowbite/plugin')
    ],
};
