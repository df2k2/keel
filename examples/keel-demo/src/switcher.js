/**
 * keel-demo/switcher: remembers the chosen variation and carries it on same-origin links.
 */
import { store, getContext } from '@wordpress/interactivity';

const KEY = 'keel-demo-variation';

function read() {
	try {
		return window.localStorage.getItem( KEY ) || '';
	} catch {
		return '';
	}
}

function write( slug ) {
	try {
		if ( slug ) {
			window.localStorage.setItem( KEY, slug );
		} else {
			window.localStorage.removeItem( KEY );
		}
	} catch {
		// Storage unavailable: the choice lasts for this page only.
	}
}

store( 'keel-demo/switcher', {
	callbacks: {
		init() {
			const current = new URL( window.location.href );
			if ( current.searchParams.has( 'variation' ) ) {
				write( current.searchParams.get( 'variation' ) );
			}
			const slug = read();
			if ( ! slug ) {
				return;
			}
			for ( const link of document.querySelectorAll( 'a[href]' ) ) {
				const url = new URL( link.href, current );
				if (
					url.origin === current.origin &&
					! url.searchParams.has( 'variation' ) &&
					! link.href.startsWith( '#' )
				) {
					url.searchParams.set( 'variation', slug );
					link.href = url.href;
				}
			}
		},
	},
	actions: {
		choose() {
			write( getContext().slug );
		},
	},
} );
