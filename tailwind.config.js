import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        'hover:bg-indigo-700',
        'hover:bg-green-700',
        'hover:bg-purple-700',
        'hover:bg-blue-700',
        'hover:bg-pink-700',
        'hover:bg-orange-700',
        'hover:bg-cyan-700',
        'hover:bg-pink-900',
        'hover:bg-gray-700',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
