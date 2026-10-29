/**
 * keel/announcement: dismisses the announcement bar for the session.
 */
import { store, getContext } from '@wordpress/interactivity';

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
			context.dismissed = true;
			write( context.id );
		},
	},
} );
