/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/**/*.blade.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        main: '#F4F6F9',
        secondary: '#343A40'
      },
    },
  },
  plugins: [],
}
