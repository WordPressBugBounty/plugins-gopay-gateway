<?php
/**
 * GoPay gateway log
 * Insert log into database
 *
 * @package   GoPay gateway
 * @author    GoPay
 * @link      https://www.gopay.com/
 * @copyright 2022 GoPay
 * @since     1.0.0
 */

/**
 * Plugin log
 *
 * @since 1.0.0
 */
class Gopay_Gateway_Log {


	/**
	 * Constructor for the plugin log
	 *
	 * @since 1.0.0
	 */
	public function __construct() { }

	/**
	 * Insert log into the database
	 *
	 * @param array $log Log text.
	 *
	 * @since  1.0.0
	 */
	public static function insert_log( array $log ) {
		global $wpdb;

		$table_name = $wpdb->prefix . GOPAY_GATEWAY_LOG_TABLE_NAME;
		$data       = array(
			'order_id'       => $log['order_id'],
			'transaction_id' => $log['transaction_id'],
			'message'        => $log['message'],
			'created_at'     => gmdate( 'Y-m-d H:i:s' ),
			'log_level'      => $log['log_level'],
			'log'            => wp_json_encode( $log['log'] ),
		);
		$where      = array(
			'order_id'       => $log['order_id'],
			'transaction_id' => $log['transaction_id'],
			'message'        => $log['message'],
		);

		$response = $wpdb->update( $table_name, $data, $where );
		if ( false === $response || $response < 1 ) {
			$wpdb->insert( $table_name, $data );
		}
	}
}
