module.exports = {
  mode: 'jit',

  content: require('fast-glob').sync([
    './src/**/*.php',
    './template-parts/**/*.php',
    './*.php',
    './inc/**/*.php',
    './**/*.php',
    './inc/**/**/*.php',
    './**/**/*.php',
    './inc/*.php',
    './src/**/*.js',
    './src/**/**/*.scss',
    './src/**/**/**/*.scss',
    './src/**/**/**/**/*.scss',
  ]),
  theme: {
    screens: {
      md: '768px',
      lg: '1024px',
      xl: '1200px',
    },

    extend: {
      fontFamily: {
        sans: ['"Inter"', "sans-serif"],
      },
      fontSize: {
        normal: ["12px", "20px"],
        medium: ["14px", "20px"],
        large: ["16px", "30px"],
        "2xl": ["20px", "35px"],
        "2.5xl": ["25px", "35px"],
        "3xl": ["30px", "40px"],
        "3.5xl": ["35px", "40px"],
        "4xl": ["40px", "40px"],
        "4.5xl": ["45px", "60px"],
        "7xl": ["70px", "85px"],
        "8xl": ["80px", "97px"],
      },
      colors: {
        primary: "#E63137",
        black: "#484848",
        secondary: '#E63137',
        "secondary-black": '#E63137',
        'grey-black': '#757575',
        'grey': '#C1C1C1',
        'grey-light': '#EFEFEF',
        white: '#FFFFFF',
        error: '#E63137',
        success: '#34CF52',
        medium: '#FFC42C'

      },
      maxWidth: {
        "btn-default": "12.5rem",
        "content-container": "55.625rem", // 890 px
        "container-primary": "75rem",
      },
    },
  },
  variants: {},
  plugins: [
    require('postcss-import'),
    require('tailwindcss/nesting'),
    require('tailwindcss'),
    require('autoprefixer'),
  ],
};
