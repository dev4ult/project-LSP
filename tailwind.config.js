/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./app/views/**/*.{php,html,js}'],
  theme: {
    extend: {
      fontFamily: {
        inter: ['Inter', 'sans-serif'],
      },
    },
  },
  daisyui: {
    themes: [
      {
        mytheme: {
          primary: '#2882EB',
          secondary: '#2C3A4B',
          accent: '#E86C00',
          neutral: '#BBFFE2',
          'base-100': '#FFFFFF',
          info: '#2561DE',
          success: '#37F477',
          warning: '#FBBD23',
          error: '#FA3B3B',
        },
      },
    ],
  },
  plugins: [require('daisyui')],
};
