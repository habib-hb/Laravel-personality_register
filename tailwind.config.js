import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                light_gray: '#E0E0E0',
                dark_gray: '#101010',
                light_mode_blue: '#0B396F',
                dark_mode_blue: '#1A579F',
                input_dark_mode: '#2C2C2C',
                light_mode_red: '#6E170B',
                dark_mode_red: '#971C0B'
            }
        },
    },

    plugins: [forms],
};
