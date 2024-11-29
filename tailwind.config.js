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
            animation: {
                'fade-in': 'fadeIn 0.5s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: 0 },
                    '100%': { opacity: 1 },
                },
            },
        },
    },

    plugins: [forms],
    safelist: [
        // Colores pastel: fondo
        'bg-rose-200',
        'bg-sky-200',
        'bg-green-200',
        'bg-purple-200',
        'bg-yellow-200',
        'bg-teal-200',
        'bg-orange-200',
        'bg-pink-200',
        'bg-cyan-200',
        'bg-amber-200',
        // Colores pastel: hover
        'hover:bg-rose-300',
        'hover:bg-sky-300',
        'hover:bg-green-300',
        'hover:bg-purple-300',
        'hover:bg-yellow-300',
        'hover:bg-teal-300',
        'hover:bg-orange-300',
        'hover:bg-pink-300',
        'hover:bg-cyan-300',
        'hover:bg-amber-300',
        // Colores pastel: bordes
        'border-rose-200',
        'border-sky-200',
        'border-green-200',
        'border-purple-200',
        'border-yellow-200',
        'border-teal-200',
        'border-orange-200',
        'border-pink-200',
        'border-cyan-200',
        'border-amber-200',
        // Colores pastel: texto
        'text-rose-700',
        'text-sky-700',
        'text-green-700',
        'text-purple-700',
        'text-yellow-700',
        'text-teal-700',
        'text-orange-700',
        'text-pink-700',
        'text-cyan-700',
        'text-amber-700',
    ],

};
