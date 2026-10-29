/**
 * keel/carousel: previous and next controls for the scroll-snap track.
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

function scrollTrack( direction ) {
	const { ref } = getElement();
	const track = ref
		.closest( '.keel-carousel' )
		?.querySelector( '.keel-carousel__track' );
	if ( ! track ) {
		return;
	}
	const rtl = window.getComputedStyle( track ).direction === 'rtl' ? -1 : 1;
	const reduced = window.matchMedia(
		'(prefers-reduced-motion: reduce)'
	).matches;
	track.scrollBy( {
		left: direction * rtl * track.clientWidth,
		behavior: reduced ? 'auto' : 'smooth',
	} );
}

store( 'keel/carousel', {
	callbacks: {
		ready() {
			getContext().ready = true;
		},
	},
	actions: {
		prev() {
			scrollTrack( -1 );
		},
		next() {
			scrollTrack( 1 );
		},
	},
} );
