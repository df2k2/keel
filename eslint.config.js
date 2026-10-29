import wordpress from '@wordpress/scripts/config/eslint.config.cjs';
import security from 'eslint-plugin-security';

export default [
	...wordpress,
	{
		files: [ 'tests/**/*.test.js' ],
		rules: {
			// The unit tests run on Node's built-in test runner, not vitest.
			'vitest/no-import-node-test': 'off',
		},
	},
	{
		files: [ 'src/js/**/*.js' ],
		...security.configs.recommended,
		languageOptions: { globals: { MutationObserver: 'readonly' } },
		rules: {
			...security.configs.recommended.rules,
			'no-eval': 'error',
			'no-implied-eval': 'error',
			'no-new-func': 'error',
		},
	},
];
