<?php

/**
 * The plugin bootstrap file
 *
 * @link                 https://www.gopay.com/
 * @since                1.0.0
 * @package              gopay-gateway
 * @wordpress-plugin
 * Plugin Name:          GoPay gateway
 * Plugin URI:           https://github.com/argo22packages/gopay-woocommerce-integration
 * Description:          WooCommerce and GoPay payment gateway integration
 * Version:              1.0.15
 * Author:               GoPay
 * Author URI:           https://www.gopay.com/
 * Text Domain:          gopay-gateway
 * License:              GPLv2 or later
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:          /languages
 * WC requires at least: 7.0.0
 * WC tested up to:      9.6.1
 */

// If this file is called directly, abort.
// Preventing direct access to your WordPress.
if (!defined('WPINC')) {
	die();
}

/**
 * Plugin version.
 * Rename this and update it as you release new versions.
 */
define( 'GOPAY_WOOCOMMERCE_VERSION', '1.0.15' );

/**
 * Constants.
 */
define('GOPAY_GATEWAY_DOMAIN', 'gopay-gateway');
define('GOPAY_GATEWAY_ID', 'wc_gopay_gateway');
define('GOPAY_GATEWAY_FULLPATH', __FILE__);
define('GOPAY_GATEWAY_URL', plugin_dir_url(__FILE__));
define('GOPAY_GATEWAY_DIR', plugin_dir_path(__FILE__));
define('GOPAY_GATEWAY_BASENAME', plugin_basename(__FILE__));
define('GOPAY_GATEWAY_BASENAME_DIR', dirname(plugin_basename(__FILE__)));
define('GOPAY_GATEWAY_LOG_TABLE_NAME', 'gopay_gateway_log');

// Check requirements.
require GOPAY_GATEWAY_DIR .
	'check-requirements.php';

// Load files.
require_once GOPAY_GATEWAY_DIR .
	'vendor/autoload.php';
require_once GOPAY_GATEWAY_DIR .
	'admin/class-gopay-gateway-admin.php';
require_once GOPAY_GATEWAY_DIR .
	'includes/class-gopay-gateway-log.php';
require_once GOPAY_GATEWAY_DIR .
	'includes/class-gopay-gateway-options.php';
require_once GOPAY_GATEWAY_DIR .
	'includes/class-gopay-gateway-activator.php';
require_once GOPAY_GATEWAY_DIR .
	'includes/class-gopay-gateway-deactivator.php';
require_once GOPAY_GATEWAY_DIR .
	'includes/class-gopay-gateway-api.php';
require_once GOPAY_GATEWAY_DIR .
	'includes/class-gopay-gateway-subscriptions.php';
require_once GOPAY_GATEWAY_DIR .
	'includes/class-gopay-gateway.php';

// Register activation/deactivation hook.
register_activation_hook(__FILE__, array('Gopay_Gateway_Activator', 'activate'));
register_deactivation_hook(__FILE__, array('Gopay_Gateway_Deactivator', 'deactivate'));

// Check if Woocommerce GoPay Gateway was instantiated.
add_action('plugins_loaded', array('Gopay_Gateway', 'get_instance'));
// Load text domain for translations.
add_action('init', array('Gopay_Gateway', 'load_textdomain'), 99);


// Declaring HPOS compatibility
add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );

/**
* Declare compatibility with cart_checkout_blocks feature 
*/
add_action( 'before_woocommerce_init', function() {
	if (class_exists('\Automattic\WooCommerce\Utilities\FeaturesUtil')) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('cart_checkout_blocks', __FILE__, true);
	}
} );

add_action( 'woocommerce_blocks_loaded', function() {
	if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
		require_once dirname( __FILE__ ) . '/includes/class-gopay-wc-blocks-support.php';

		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gopay_Blocks_Support );
			}
		);
	}
} );
