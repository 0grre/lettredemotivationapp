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
            zIndex: {
                '60': '60',
                '70': '70',
                '80': '80',
                '90': '90',
                '100': '100',
            }
        },
        colors: {
            //primary: colors.violet,
            primary: colors.indigo,
            emerald: colors.emerald
        }
    },

    plugins: [
        require('@tailwindcss/forms'),
        require("tailwind-gradient-mask-image"),
        require('flowbite/plugin')
    ],
};
