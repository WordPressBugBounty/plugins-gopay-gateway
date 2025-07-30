<?php
/**
 * Plugin deactivation
 *
 * @package   GoPay gateway
 * @author    GoPay
 * @link      https://www.gopay.com/
 * @copyright 2022 GoPay
 * @since     1.0.0
 */

/**
 * Plugin deactivator
 *
 * @since 1.0.0
 */
class Gopay_Gateway_Deactivator {


	/**
	 * Deactivation
	 *
	 * @since 1.0.0
	 */
	public static function deactivate() {
		// self::delete_log_table(); !
	}

	/**
	 * Delete log table if it exists
	 *
	 * @since 1.0.0
	 */
	private static function delete_log_table() {
		global $wpdb;

		$wpdb->query( $wpdb->prepare( 'DROP TABLE IF EXISTS %s%s', array( $wpdb->prefix, GOPAY_GATEWAY_LOG_TABLE_NAME ) ) );
	}
}
