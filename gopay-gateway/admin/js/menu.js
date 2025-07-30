/**
 * Admin menu JS
 *
 * @package   WooCommerce GoPay gateway
 * @author    GoPay
 * @link      https://www.gopay.com/
 * @copyright 2022 GoPay
 * @since     1.0.0
 * @version   1.0.0
 */

/**
 * Open Pop Up log
 *
 * Version: 1.0.0
 */
function openPopup(log) {
	const popup = document.getElementById( 'gopay-gateway-menu-popup' );
	popup.querySelectorAll( 'span' ).forEach( e => e.remove() );
	const span     = document.createElement( 'span' );
	span.innerHTML = JSON.stringify( log );
	popup.append( span );

	popup.style.display = 'grid';
}

/**
 * Close Pop Up log
 *
 * Version: 1.0.0
 */
function closePopup() {
	const popup = document.getElementById( 'gopay-gateway-menu-popup' );
	const elem  = popup.querySelectorAll( 'span' );
	elem.forEach( e => e.remove() );

	popup.style.display = 'none';
}
