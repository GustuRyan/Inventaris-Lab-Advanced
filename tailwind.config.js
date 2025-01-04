/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'hero-gradient': 'linear-gradient(to right, #EE2E45 75%, transparent 25%)',
      },
      colors: {
        'light-red' : '#FFEDEF',
        'bold-red' : '#EE2E45',
        'light-blue' : '#F0F6FF',
        'bold-blue' : '#292F3E',
        'primary-green' : '#1DC88A',
      }
    },
  },
  plugins: [],
  
}

