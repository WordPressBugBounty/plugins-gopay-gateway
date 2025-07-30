<?php
/**
 * GoPay gateway admin menu
 * Initialize plugin admin menu
 *
 * @package   GoPay gateway
 * @author    GoPay
 * @link      https://www.gopay.com/
 * @copyright 2022 GoPay
 * @since     1.0.0
 */

/**
 * Admin menu
 *
 * @since  1.0.0
 */
class Gopay_Gateway_Admin_Menu {


	/**
	 * Constructor for the plugin admin menu
	 *
	 * @since 1.0.0
	 */
	public static function create_menu_actions() {
		add_action( 'admin_menu', array( 'Gopay_Gateway_Admin_Menu', 'create_menu' ) );
		add_action( 'admin_enqueue_scripts', array( 'Gopay_Gateway_Admin_Menu', 'admin_enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( 'Gopay_Gateway_Admin_Menu', 'admin_enqueue_scripts' ) );
	}

	/**
	 * Admin enqueue styles
	 *
	 * @since 1.0.0
	 */
	public static function admin_enqueue_styles() {
		wp_enqueue_style(
			GOPAY_GATEWAY_DOMAIN . '-menu-styles',
			GOPAY_GATEWAY_URL . 'admin/css/menu.css',
			array(),
			GOPAY_WOOCOMMERCE_VERSION
		);
	}

	/**
	 * Admin enqueue scripts
	 *
	 * @since 1.0.0
	 */
	public static function admin_enqueue_scripts() {
		wp_enqueue_script(
			GOPAY_GATEWAY_DOMAIN . '-menu-scripts',
			GOPAY_GATEWAY_URL . 'admin/js/menu.js',
			array(),
			GOPAY_WOOCOMMERCE_VERSION
		);
	}

	/**
	 * Create GoPay gateway admin page
	 *
	 * @since 1.0.0
	 */
	public static function create_menu() {
		if ( ! defined( 'GOPAY_GATEWAY_ADMIN_MENU' ) ) {
			add_menu_page(
				__( 'GoPay gateway', 'gopay-gateway' ),
				__( 'GoPay gateway', 'gopay-gateway' ),
				'manage_woocommerce',
				'gopay-gateway-menu'
			);

			add_submenu_page(
				'gopay-gateway-menu',
				__( 'GoPay info', 'gopay-gateway' ),
				__( 'Info', 'gopay-gateway' ),
				'manage_woocommerce',
				'gopay-gateway-menu',
				array( 'Gopay_Gateway_Admin_Menu', 'load_admin_info_page' )
			);

			add_submenu_page(
				'gopay-gateway-menu',
				__( 'GoPay log', 'gopay-gateway' ),
				__( 'Log', 'gopay-gateway' ),
				'manage_woocommerce',
				'gopay-gateway-menu-log',
				array( 'Gopay_Gateway_Admin_Menu', 'load_admin_log_page' )
			);

			define( 'GOPAY_GATEWAY_ADMIN_MENU', true );
		}
	}

	/**
	 * Load admin page
	 *
	 * @since 1.0.0
	 */
	public static function load_admin_info_page() {
		include_once 'views/admin.php';
	}

	/**
	 * Load admin page
	 *
	 * @since 1.0.0
	 */
	public static function load_admin_log_page() {
		include_once 'views/log.php';
	}
}
