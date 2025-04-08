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
        'bg-red-600',
        'text-red-900',
        'bg-red-100',
        'bg-amber-600',
        'text-amber-700',
        'text-amber-900',
        'bg-amber-100',
        'bg-green-600',
        'text-green-900',
        'bg-green-100',
        'col-span-2',
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
