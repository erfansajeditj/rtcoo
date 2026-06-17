/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          teal: '#5BC8C0',
          dark: '#3AACA4',
          orange: '#f97316',
        }
      }
    },
  },
  plugins: [],
}