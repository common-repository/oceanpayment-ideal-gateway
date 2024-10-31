<?php
/*
	Plugin Name: Oceanpayment iDEAL Gateway
	Plugin URI: http://www.oceanpayment.com/
	Description: WooCommerce Oceanpayment iDEAL Gateway.
	Version: 6.0
	Author: Oceanpayment
	Requires at least: 4.0
	Tested up to: 6.1
    Text Domain: oceanpayment-ideal-gateway
*/


/**
 * Plugin updates
 */

load_plugin_textdomain( 'wc_oceanideal', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );

add_action( 'plugins_loaded', 'woocommerce_oceanideal_init', 0 );

/**
 * Initialize the gateway.
 *
 * @since 1.0
 */
function woocommerce_oceanideal_init() {

	if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;

	require_once( plugin_basename( 'class-wc-oceanideal.php' ) );

	add_filter('woocommerce_payment_gateways', 'woocommerce_oceanideal_add_gateway' );

} // End woocommerce_oceanideal_init()

/**
 * Add the gateway to WooCommerce
 *
 * @since 1.0
 */
function woocommerce_oceanideal_add_gateway( $methods ) {
	$methods[] = 'WC_Gateway_Oceanideal';
	return $methods;
} // End woocommerce_oceanideal_add_gateway()