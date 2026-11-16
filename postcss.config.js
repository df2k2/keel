import postcssImport from 'postcss-import';
import postcssPresetEnv from 'postcss-preset-env';
import cssnano from 'cssnano';

/**
 * Logical properties ship as written. Left on, these features rewrite them to their left-to-right
 * physical twins (padding-inline-start becomes padding-left), which pins the built CSS to one
 * direction and stops right-to-left sites from mirroring. Every browser WordPress supports
 * understands the logical forms.
 */
const LOGICAL_FEATURES = [
	'logical-properties-and-values',
	'float-clear-logical-values',
	'logical-overflow',
	'logical-overscroll-behavior',
	'logical-resize',
	'logical-viewport-units',
];

export default {
	plugins: [
		postcssImport(),
		postcssPresetEnv( {
			stage: 2,
			features: Object.fromEntries(
				LOGICAL_FEATURES.map( ( feature ) => [ feature, false ] )
			),
		} ),
		cssnano( { preset: 'default' } ),
	],
};
