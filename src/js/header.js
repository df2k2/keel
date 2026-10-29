/**
 * keel/header: marks the header as scrolled and makes the rest of the page
 * inert while core's navigation overlay is open.
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

const MODAL_CLASS = 'has-modal-open';

store( 'keel/header', {
	callbacks: {
		onScroll() {
			getContext().scrolled = window.scrollY > 8;
		},
		init() {
			getContext().scrolled = window.scrollY > 8;
			const { ref } = getElement();
			const root = document.documentElement;
			const sync = () => {
				const open = root.classList.contains( MODAL_CLASS );
				for ( const sibling of ref.parentElement.children ) {
					if ( sibling !== ref ) {
						sibling.toggleAttribute( 'inert', open );
					}
				}
			};
			const observer = new MutationObserver( sync );
			observer.observe( root, {
				attributes: true,
				attributeFilter: [ 'class' ],
			} );
			sync();
			return () => observer.disconnect();
		},
	},
} );
