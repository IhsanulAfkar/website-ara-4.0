/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/Views/**/*.{html,js,php}", "./public/css/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
