<?php
/**
 * Frontend class
 *
 * @author        Flexible Web Design
 * @package       flexizoom-woocommerce-zoom-magnifier
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

if (!class_exists('FlexiZoom_FE')) :
	class FlexiZoom_FE
	{
		private static $_this;

		public function __construct()
		{
			self::$_this = $this;

			add_action('template_redirect', array($this, 'template_redirect'));
		}

		public function template_redirect()
		{
			if ($this->is_woocommerce_active()) {
				remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
				remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);
				add_action('woocommerce_before_single_product_summary', array($this, 'show_product_images'), 20);
				add_action('woocommerce_product_thumbnails', array($this, 'show_product_thumbnails'), 20);
				add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts_styles'));
			}
		}

		public function is_woocommerce_active()
		{
			return is_plugin_active('woocommerce/woocommerce.php') || is_plugin_active_for_network('woocommerce/woocommerce.php');
		}

		function show_product_images()
		{
			$wc_get_template = function_exists('wc_get_template') ? 'wc_get_template' : 'woocommerce_get_template';
			$wc_get_template('single-product/product-image.php', array(), '', FLEXI_ZOOM_DIR . 'templates/');
		}

		function show_product_thumbnails()
		{
			$wc_get_template = function_exists('wc_get_template') ? 'wc_get_template' : 'woocommerce_get_template';
			$wc_get_template('single-product/product-thumbnails.php', array(), '', FLEXI_ZOOM_DIR . 'templates/');
		}

		function wp_enqueue_scripts_styles()
		{
			if (is_singular('product')) {
				wp_enqueue_script('flexizoom-js', FLEXI_ZOOM_FRONTEND_ASSETS . '/dist/flexiZoom.min.js', array(), FLEXI_ZOOM_VERSION, true);
				wp_enqueue_style('flexizoom-css', FLEXI_ZOOM_FRONTEND_ASSETS . '/dist/flexiZoom.min.css', array(), FLEXI_ZOOM_VERSION);
			}
		}
	}
endif;

new FlexiZoom_FE();
