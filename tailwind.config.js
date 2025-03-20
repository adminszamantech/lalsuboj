/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'base-color': '#343a40',
                'base-color-2': '#008970',
                'base-color-3': '#0c2b57',
                'base-color-hover': '#3b82f6',
                'custom-bc': '#d5d4d4',
                'custom-dbc': '#234e67',

            },
        },
    },
    darkMode: 'class', // Enable class-based dark mode
    plugins: [],
}

