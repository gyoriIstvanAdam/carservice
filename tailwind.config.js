module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        menubarBg: '#1E3A8A',
        menuText: '#FFFFFF',
        menuHoverBg: '#3B82F6',
      },
      spacing: {
        '18': '4.5rem',
      },
    },
  },
  plugins: [],
}