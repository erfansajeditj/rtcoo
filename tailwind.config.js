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
          teal: '#0d9488',
          dark: '#115e59',
          orange: '#f97316',
        }
      }
    },
  },
  plugins: [],
}