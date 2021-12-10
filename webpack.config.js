const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
	...defaultConfig,
	entry: {
		'block-one': './blocks/block-one',
		'block-two': './blocks/block-two'
	},
};
