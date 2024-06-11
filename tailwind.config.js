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
        "transparent": "transparent",
        "light-text-base": "#3d405b",
        "light-text-secondary": "#5a5a5c",
        "light-text-highlight": "#e07a5f",
        "dark-text-base": "#f4f1de",
        "dark-text-secondary": "#f2efc1",
        "dark-text-highlight": "#e07a5f",
        "light-primary": "#e07a5f",
        "light-primary-light": "#dfada1",
        "primary-dark": "#de4215",
        "dark-primary": "#e07a5f",
        "dark-primary-light": "#dfada1",
        "dark-primary-dark": "#de4215",
        "light-neutral": "#f4f1de",
        "light-neutral-light": "#f5f5f0",
        "dark-neutral": "#3d405b",
        "dark-neutral-light":  "#5a5a5c",
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
  plugins: [],
  output: 'public/assets/styles/toto.css',
}
