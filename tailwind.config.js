import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import withMT from "@material-tailwind/html/utils/withMT";

/** @type {import('tailwindcss').Config} */
export default withMT({
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js', // Add this for Flowbite
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        'node_modules/preline/dist/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    600: '#3b82f6',
                    700: '#2563eb',
                    800: '#1d4ed8',
                    900: '#0032A0',
                },
                secondary: {
                    600: '#6c757d', // Similar to Bootstrap's gray
                    700: '#5a6268', // Darker gray for hover
                    800: '#495057', // Even darker for active or dark mode
                    900: '#343a40', // Darkest gray for strong contrast in dark mode
                },
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('flowbite/plugin')({
            datatables: true, // Enable Flowbite datatables
        }),
        require('preline/plugin'),
    ],
});
