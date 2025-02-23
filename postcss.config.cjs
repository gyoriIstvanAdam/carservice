module.exports = {
	plugins: [
		require('postcss-import'),
		require('postcss-advanced-variables'),
		require('postcss-nesting'),
		require('@tailwindcss/postcss')('./tailwind.config.js'),
		require('autoprefixer'),
	],
};