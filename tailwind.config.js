/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php',
      ],
  theme: {
    extend: {
        colors: {
            newgray: {
                50: '#f9fafb',
                100: '#f4f5f7',
                200: '#e5e7eb',
                300: '#d5d6d7',
                400: '#9e9e9e',
                500: '#707275',
                600: '#4c4f52',
                700: '#24262d',
                800: '#1a1c23',
                900: '#121317',
                // default values from Tailwind UI palette
                // '300': '#d2d6dc',
                // '400': '#9fa6b2',
                // '500': '#6b7280',
                // '600': '#4b5563',
                // '700': '#374151',
                // '800': '#252f3f',
                // '900': '#161e2e',
              },
        },
        fontFamily: {
            'sans': ['Poppins', ...defaultTheme.fontFamily.sans],
            },
    },
  },
  plugins: [
    require('tailwind-scrollbar-hide'),
    require('@tailwindcss/typography'),
  ],
}

