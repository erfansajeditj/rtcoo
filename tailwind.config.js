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
          teal: '#56C5D0',
          dark: '#3AABB5',
          orange: '#f97316',
        }
      }
    },
  },
  plugins: [],
}