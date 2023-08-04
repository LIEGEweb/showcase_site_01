/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')

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
                'icon-check': "url('../icons/check.svg')",
                'icon-minus-small': "url('../icons/minus-small.svg')",
            },
            colors: {
                current: 'currentColor',
                white: "rgb(248 250 252)",
                black: "rgb(2 6 23)",
                secondary: "#219ebc",
                darkWhite: "rgb(2 6 23)",
                darkBlack: "rgb(248 250 252)",
                darkSecondary: "#219ebc",
                // white: "rgb(248 250 252)",
                // neutral : "rgb(241 245 249)",
                // "primary-dark" : "rgb(148 163 184)",
                // primary : "rgb(51 65 85)",
                // "neutral-dark" : "rgb(15 23 42)",
                // secondary: "#219ebc"
            },
            fontFamily: {
                h1: "NotoSans-Black",
                h2: "NotoSans-Bold",
            },
        },
    },
    plugins: [
        function ({ addVariant }) {
            addVariant('child', '& > *');
            // addVariant('child-hover', '& > *:hover');
        }
    ],
}