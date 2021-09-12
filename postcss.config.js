module.exports = (ctx) => ({
	map: { annotation: false },
	parser: ctx.options.parser,
	plugins: {
		autoprefixer: {},
		cssnano: {
			preset: 'default'
		},
	},
});
