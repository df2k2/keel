import wordpress from '@wordpress/scripts/config/eslint.config.cjs';

export default [
	...wordpress,
	{
		files: [ 'tests/**/*.test.js' ],
		rules: {
			// The unit tests run on Node's built-in test runner, not vitest.
			'vitest/no-import-node-test': 'off',
		},
	},
];
