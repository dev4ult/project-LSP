/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./app/views/**/*.{php,html,js}'],
  theme: {
    extend: {},
  },
  plugins: [require('daisyui')],
};
