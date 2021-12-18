const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    mode: 'jit',

    important: true,

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/**/*.php',
    ],

    theme: {
        extend: {
            fontSize: {
                'xxs': '.625rem',
            },
            fontFamily: {
                rbt: ['Roboto Condensed', ...defaultTheme.fontFamily.sans],
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                display: ['"Exo 2"', ...defaultTheme.fontFamily.sans],
                serif: ['Andada Pro', ...defaultTheme.fontFamily.sans],
                handwriting: ['Dancing Script', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                slate: colors.slate,
                gray: colors.gray,
                zinc: colors.zinc,
                neutral: colors.neutral,
                stone: colors.stone,
                red: colors.red,
                orange: colors.orange,
                amber: colors.amber,
                yellow: colors.yellow,
                lime: colors.lime,
                green: colors.green,
                emerald: colors.emerald,
                teal: colors.teal,
                cyan: colors.cyan,
                sky: colors.sky,
                blue: colors.blue,
                indigo: colors.indigo,
                violet: colors.violet,
                purple: colors.purple,
                fuchsia: colors.fuchsia,
                pink: colors.pink,
                rose: colors.rose,
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/typography'),
    ],
};
