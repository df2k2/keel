/**
 * keel/marquee: pauses and resumes the marquee row from a button, so visitors who cannot hover
 * (touch, keyboard, switch access) can stop moving content (WCAG 2.2.2).
 */
import { store, getContext } from '@wordpress/interactivity';

store( 'keel/marquee', {
	state: {
		get label() {
			const context = getContext();
			return context.paused ? context.play : context.pause;
		},
	},
	actions: {
		toggle() {
			const context = getContext();
			context.paused = ! context.paused;
		},
	},
} );
