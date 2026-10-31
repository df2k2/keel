/* Lighthouse CI: eight demo pages on the default mobile profile, median of three runs (Lighthouse refuses a 404 document, so the 404 page is covered by axe only). */
const base = process.env.WP_BASE_URL || 'http://localhost:8888';
const pages = [ '/', '/service/', '/location/', '/blog/', '/spring-maintenance-checklist/', '/dental/', '/journal/', '/listings/' ];

module.exports = {
	ci: {
		collect: {
			url: pages.map( ( path ) => base + path ),
			numberOfRuns: 3,
			settings: {
				budgetPath: 'tests/budgets.json',
				chromeFlags: '--no-sandbox --disable-dev-shm-usage',
			},
		},
		assert: {
			assertions: {
				// 3 s: CI runners paint the serif hero titles 2.2 to 2.7 s in; the gate is a sanity bound, not a target (Chris, 2026-10-31).
				'largest-contentful-paint': [ 'error', { maxNumericValue: 3000, aggregationMethod: 'median' } ],
				'cumulative-layout-shift': [ 'error', { maxNumericValue: 0.05, aggregationMethod: 'median' } ],
				'total-blocking-time': [ 'error', { maxNumericValue: 150, aggregationMethod: 'median' } ],
				'performance-budget': 'error',
				'categories:accessibility': [ 'error', { minScore: 1 } ],
			},
		},
		upload: { target: 'filesystem', outputDir: '.lighthouseci' },
	},
};
