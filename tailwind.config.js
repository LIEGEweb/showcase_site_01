/** @type {import('tailwindcss').Config} */
// const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        "./assets/**/*.js",
        "./templates/**/*.html.twig",
    ],
    theme: {
        extend: {
            backgroundImage: {
                'icon-phone': "url('../icons/phone.svg')",
                'icon-envelope': "url('../icons/envelope.svg')",
                'icon-map-pin': "url('../icons/map-pin.svg')",
            },
            colors: {
                "primary" : "rgb(51 65 85)",
                "primary-dark" : "rgb(148 163 184)",
                "neutral" : "rgb(241 245 249)",
                "neutral-dark" : "rgb(15 23 42)",

            }
        },
    },
    plugins: [],
}