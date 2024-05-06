/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            boxShadow: {
                custom: '0 4px 12px 0 rgba(13, 35, 67, 0.08)'
            }
        },
        screens: {
            'sx': {'min': '100px'},
            'sm': {'min': '390px'},
            // => @media (max-width: 640px) { ... }

            'md': {'min': '600px'},
            // => @media (min-width: 768px) { ... }

            'lg': {'min': '800px'},
            // => @media (min-width: 1024px) { ... }

            'xl': {'min': '1000px'},
            // => @media (min-width: 1280px) { ... }

            '2xl': {'min': '1200px'},
            // => @media (min-width: 1536px) { ... }
        },
    },
    plugins: [],
}
