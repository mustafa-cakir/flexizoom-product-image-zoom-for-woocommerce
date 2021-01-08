<?php
/**
 * Plugin Name: FlexiZoom - Product Image Zoom for WooCommerce
 * Plugin URI: https://www.flexiblewebdesign.com
 * Description: FlexiZoom - Product Image Zoom for WooCommerce adds zoom effect, lightbox modal and images slider product images. No jQuery dependency, writen using pure JavaScript
 * Version: 1.0.0
 * Author: Flexible Web Design
 * Author URI: http://www.flexiblewebdesign.com/
 * License: GPLv3
 *
 * Text Domain: Flexible Web Design
 * Domain Path: /languages/
 *
 * WC requires at least: 3.0.0
 * WC tested up to: 5.6
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (!function_exists('is_plugin_active_for_network')) {
	require_once(ABSPATH . '/wp-admin/includes/plugin.php');
}

if (!class_exists('FlexiZoom')) :
	/**
	 * Main FlexiZoom Class
	 *
	 * @class FlexiZoom
	 */
	final class FlexiZoom
	{
		public $version = '1.0.0';
		protected static $_instance = null;


		/**
		 * Main FlexiZoom Instance
		 *
		 * Ensures only one instance of FlexiZoom is loaded or can be loaded
		 *
		 * @static
		 * @return FlexiZoom - Main instance
		 */
		public static function instance()
		{
			if (is_null(self::$_instance)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Image Zoooom Constructor
		 *
		 * @access public
		 */
		public function __construct()
		{
			define('FLEXI_ZOOM_FILE', __FILE__);
			define('FLEXI_ZOOM_URL', plugins_url('/', __FILE__));
			define('FLEXI_ZOOM_FRONTEND_ASSETS', plugins_url('assets/frontend', __FILE__));
			define('FLEXI_ZOOM_ADMIN_ASSETS', plugins_url('assets/admin', __FILE__));
			define('FLEXI_ZOOM_PATH', plugin_dir_path(__FILE__));
			define('FLEXI_ZOOM_VERSION', $this->version);
			defined('FLEXI_ZOOM_DIR') || define('FLEXI_ZOOM_DIR', plugin_dir_path(__FILE__));

			if (is_admin()) {
				include_once 'includes/class-flexizoom-admin.php';
			} else {
				include_once 'includes/class-flexizoom-fe.php';

			}
		}

	}

endif;

/**
 * Returns the main instance of FlexiZoom
 *
 * @return FlexiZoom
 */
if (!function_exists('FlexiZoom')) {
	function FlexiZoom()
	{
		if (is_plugin_active('flexizoom-product-image-zoom-for-woocommerce-pro/flexizoom-product-image-zoom-for-woocommerce-pro.php')) {
			deactivate_plugins(plugin_basename(__FILE__));
			wp_die('Plugin activation failed. <br/>Please disable <strong>FlexiZoom - Product Image Zoom for WooCommerce Pro</strong> before activating this plugin');
		} else {

			/**
			 *  * Plugin action link to Settings page
			 * @param $links
			 * @return array
			 */
			function wp_flexizoom_magnifier_action_links($links)
			{
				$settings_link = '<a href="admin.php?page=flexizoom">' .
				  esc_html(__('Settings', 'flexizoom-woocommerce-zoom-magnifier')) . '</a>';

				return array_merge(array($settings_link), $links);
			}

			add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wp_flexizoom_magnifier_action_links');

			return FlexiZoom::instance();
		}
	}
}

FlexiZoom();
