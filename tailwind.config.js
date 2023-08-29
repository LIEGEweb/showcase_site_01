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
                'icon-nurse-white': "url('../icons/user-nurse-white.svg')",
                'icon-phone': "url('../icons/phone.svg')",
                'icon-envelope': "url('../icons/envelope.svg')",
                'icon-map-pin': "url('../icons/map-pin.svg')",
                'icon-check': "url('../icons/check.svg')",
                'icon-minus-small': "url('../icons/minus-small.svg')",
                'icon-bars-2': "url('../icons/bars-2.svg') fill-white",
                'splash-left': "url('../svg/splash-left.svg')"
            },
            colors: {
                // NEXABYTE
            /*    current: 'currentColor',
                white: "#F5F5F5",
                black: "rgb(0 0 0)",
                secondary: "rgb(111 0 245)",
                darkWhite: "rgb(2 6 23)",
                darkBlack: "rgb(248 250 252)",
                darkSecondary: "#219ebc",*/
                /*DEFAULT*/
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
                "poppins-regular": [ 'Poppins-regular', "sans-serif"],
                "poppins-semibold": [ 'Poppins-semibold', "sans-serif"],
                "poppins-medium": [ 'Poppins-regular', "sans-serif"],
            },
            transitionProperty: {
                'height': 'height',
                'width': 'width',
            },
            aspectRatio: {
                '74': '.74',
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