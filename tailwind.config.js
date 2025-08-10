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
                sans: ['Inter', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                inter: ['Inter', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
            },
            colors: {
                'eventify-gold': '#d3ad57',
                'eventify-dark': '#313244',
            },
            backdropBlur: {
                'xs': '2px',
                'xl': '24px',
                '2xl': '40px',
                '3xl': '64px',
            },
            backgroundColor: {
                'glass': 'rgba(255, 255, 255, 0.08)',
                'glass-dark': 'rgba(49, 50, 68, 0.08)',
            },
            borderColor: {
                'glass': 'rgba(255, 255, 255, 0.15)',
                'glass-dark': 'rgba(49, 50, 68, 0.15)',
            }
        },
    },

    plugins: [forms],
};
