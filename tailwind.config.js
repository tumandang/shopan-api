/** @type {import('tailwindcss').Config} */
export default {
    content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
              fontFamily: { 'sora': ['Sora', 'sans-serif'],},
                    colors: {'brand': '#FF8133',
                        'brand-light': '#FF9A56', }
    },
  },
  plugins: [],
}

