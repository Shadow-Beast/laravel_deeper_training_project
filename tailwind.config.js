const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: ['./resources/views/**/*.blade.php'],
    theme: {
        container: {
            center: true,
            screens: {
                sm: '640px',
                md: '768px',
                lg: '1024px',
                xl: '1280px',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    light: '#a5b4fc',
                    DEFAULT: '#6967ec',
                    dark: '#4f46e5',
                },
                secondary: {
                    light: '#404040',
                    DEFAULT: '#262626',
                    dark: '#0d0d0d',
                },
                muted: {
                    DEFAULT: '#d1d5db'
                }
            },
        },
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/line-clamp')],
};
