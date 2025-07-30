<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

defined( 'ABSPATH' ) || exit;


/**
 * WC_Gopay_Blocks_Support class.
 *
 * @extends AbstractPaymentMethodType
 */
final class WC_Gopay_Blocks_Support extends AbstractPaymentMethodType {
	private $gateway;
	protected $name = 'gopay';

	public function initialize() {
		$this->settings = get_option( 'woocommerce_' . GOPAY_GATEWAY_ID . '_settings' );
		$this->gateway = new Gopay_Gateway();
	}

	public function is_active() {
		return ! empty( $this->settings['enabled'] ) && 'yes' === $this->settings['enabled'];
	}

	public function get_payment_method_script_handles() {
		wp_register_script(
			'wc-gopay-blocks-integration',
			plugin_dir_url(__FILE__) . 'block/index.js',
			[
				'wc-blocks-registry',
				'wc-settings',
				'wp-element',
				'wp-html-entities',
				'wp-i18n',
			],
			null,
			true
		);

		wp_set_script_translations(
			'wc-gopay-blocks-integration',
			'gopay-gateway'
		);

		return [ 'wc-gopay-blocks-integration' ];
	}

	public function get_payment_method_data() {
		return [
			'title' => $this->gateway->title,
			'description' => $this->gateway->description,
		];
	}
}
