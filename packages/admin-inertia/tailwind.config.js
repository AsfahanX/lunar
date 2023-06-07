import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    safelist: [
        {
            pattern: /justify-(start|between|end)/,
            variants: ['sm', 'md', 'lg'],
        },
        {
            pattern: /items-(start|center|end)/,
            variants: ['sm', 'md', 'lg'],
        },
        {
            pattern: /flex-(1|auto|initial|none)/,
            variants: ['sm', 'md', 'lg'],
        },
        {
            pattern: /hidden/,
            variants: ['sm', 'md', 'lg'],
        },
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            zIndex: {
                75: 75,
            },
        },
    },
    plugins: [forms],
};
