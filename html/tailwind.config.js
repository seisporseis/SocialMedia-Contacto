/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    fontFamily: {
      'sans': ['Lato', 'sans-serif'],
  },
  colors: {
    'blue': '#001F5F',
    'purple': '#5F67B9',
    'light-purple': '#ABC2F2',
    'yellow': '#FFC836',
    'yellow-dark': '#e8af17',
    'gray-dark': '#151619',
    'gray': '#5C5D66',
    'white': '#ffffff',
    'red': '#b42818',
    'green': '#357e38'
  },
},
  plugins: [],
};
