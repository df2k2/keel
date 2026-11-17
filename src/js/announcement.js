/**
 * keel/announcement: dismisses the announcement bar for the session.
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

const key = ( id ) => `keel-announcement-${ id }`;

function read( id ) {
	try {
		return window.sessionStorage.getItem( key( id ) ) === '1';
	} catch {
		return false;
	}
}

function write( id ) {
	try {
		window.sessionStorage.setItem( key( id ), '1' );
	} catch {
		// Storage is unavailable; the bar still hides for this page view.
	}
}

const FOCUSABLE =
	'a[href], button:not([disabled]), input:not([disabled]):not([type="hidden"]), select:not([disabled]), textarea:not([disabled]), summary, [tabindex]:not([tabindex="-1"])';

/**
 * Moves focus to the first focusable element after the bar. Hiding the bar removes the button that
 * held focus; left alone, focus falls back to the document and a screen reader starts over from the top.
 *
 * @param {Element} bar The announcement bar.
 */
function focusAfter( bar ) {
	let passed = false;
	for ( const candidate of bar.ownerDocument.querySelectorAll( FOCUSABLE ) ) {
		if ( bar.contains( candidate ) ) {
			passed = true;
		} else if ( passed && candidate.getClientRects().length > 0 ) {
			candidate.focus();
			return;
		}
	}
}

store( 'keel/announcement', {
	callbacks: {
		restore() {
			const context = getContext();
			context.dismissed = read( context.id );
		},
	},
	actions: {
		dismiss() {
			const context = getContext();
			const bar = getElement().ref?.closest(
				'[data-wp-interactive="keel/announcement"]'
			);
			const hadFocus = bar?.contains( bar.ownerDocument.activeElement );
			context.dismissed = true;
			write( context.id );
			if ( bar && hadFocus ) {
				focusAfter( bar );
			}
		},
	},
} );
