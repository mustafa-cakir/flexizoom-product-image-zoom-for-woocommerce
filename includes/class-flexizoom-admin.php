<?php
/**
 * Admin class
 *
 * @author        Flexible Web Design
 * @package       flexizoom-woocommerce-zoom-magnifier
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

if (!class_exists('FlexiZoom_Admin')) :
	class FlexiZoom_Admin
	{

		public function __construct()
		{
			add_action('admin_menu', array($this, 'flexizoom_add_plugin_page'));
			add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts_and_styles'));
			add_action('admin_init', array($this, 'register_flexizoom_settings'));
		}

		public static function admin_enqueue_scripts_and_styles()
		{
			if (isset($_GET['page']) && $_GET['page'] === 'flexizoom') {
				// scripts
				wp_enqueue_script('bootstrap-bundle', '//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js', array('jquery'), FLEXI_ZOOM_VERSION, true);
				wp_enqueue_script('wp-color-picker', '', array('jquery'), FLEXI_ZOOM_VERSION, true);
				wp_enqueue_script('flexizoom-js', FLEXI_ZOOM_FRONTEND_ASSETS . '/dist/flexiZoom.min.js', array(), FLEXI_ZOOM_VERSION, true);
				wp_enqueue_script('flexi-zoom-admin', FLEXI_ZOOM_ADMIN_ASSETS . '/js/script-es2015.js', array('jquery', 'flexizoom-js', 'wp-color-picker', 'bootstrap-bundle'), FLEXI_ZOOM_VERSION, true);

				// styles
				wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css', array(), FLEXI_ZOOM_VERSION);
				wp_enqueue_style('wp-color-picker');
				wp_enqueue_style('flexizoom-css', FLEXI_ZOOM_FRONTEND_ASSETS . '/dist/flexiZoom.min.css', array(), FLEXI_ZOOM_VERSION);
				wp_enqueue_style('flexi-zoom-admin', FLEXI_ZOOM_ADMIN_ASSETS . '/css/style.css', '', FLEXI_ZOOM_VERSION);
			}
		}

		public function register_flexizoom_settings()
		{
			//register our settings
			register_setting(
			  'flexizoom_option_group', // option_group
			  'flexizoom_options', // option_name
			  array($this, 'flexizoom_sanitize') // sanitize_callback
			);

			add_settings_section(
			  'flexizoom_setting_section', // id
			  'Settings', // title
			  null, // callback
			  'flexizoom-admin' // page
			);

			add_settings_field(
			  'zoom_type', // id
			  'Zoom Type', // title
			  null, // callback
			  'flexizoom-admin', // page
			  'flexizoom_setting_section' // section
			);
		}

		public function flexizoom_add_plugin_page()
		{
			add_menu_page(
			  'FlexiZoom', // page_title
			  'FlexiZoom', // menu_title
			  'administrator', // capability
			  'flexizoom', // menu_slug
			  array($this, 'flexizoom_create_admin_page'), // function
			  'dashicons-search', // icon_url
			  81 // position
			);
		}


		public function flexizoom_create_admin_page()
		{
			if (is_file(FLEXI_ZOOM_PATH . 'admin/layout.php')) {
				include_once FLEXI_ZOOM_PATH . 'admin/layout.php';
			}
		}

		public function flexizoom_sanitize($input)
		{
			$sanitary_values = array();
			$availableSettings = array(
			  'zoom_type',
			  'zoom_slider_type',
			  'zoom_is_lazyload',
			  'zoom_is_arrows',
			  'zoom_arrow_color',
			  'zoom_is_pagination',
			  'zoom_window_width',
			  'zoom_window_height',
			  'zoom_level',
			  'zoom_level_indicator_type',
			  'thumbs_position_mobile',
			  'thumbs_position_tablet',
			  'thumbs_position_web',
			  'slider_is_enable',
			  'slider_gap',
			  'slider_count_mobile',
			  'slider_count_tablet',
			  'slider_count_web',
			  'slider_count_xl',
			  'slider_per_move',
			  'slider_focus',
			  'slider_is_caption',
			  'slider_is_hide_thumbnails',
			  'slider_is_loop',
			  'slider_is_arrows',
			  'slider_is_keyboard',
			  'slider_arrow_color',
			  'slider_active_border_color',
			  'slider_is_pagination',
			  'zoom_level_label',
			  'is_lens_stay_inside',
			  'preview_offset_x',
			  'preview_offset_y',
			  'inner_max_width',
			  'is_touch_enabled',
			  'two_finter_notice',
			  'hover_delay',
			  'touch_delay',
			  'lens_height',
			  'lens_width',
			  'is_touch_overlay',
			  'is_hover_overlay',
			  'is_lightbox',
			  'lightbox_is_desc',
			  'lightbox_is_show_title_in_desc',
			  'lightbox_desc_position',
			  'lightbox_is_close_button',
			  'lightbox_is_autoplay_videos',
			  'lightbox_width',
			  'lightbox_height',
			  'lightbox_video_width',
			  'lightbox_is_loop',
			  'lightbox_is_touch_nav',
			  'lightbox_is_touch_follow_axis',
			  'lightbox_is_keyboard_nav',
			  'lightbox_is_close_on_outside_click',
			  'lightbox_is_zoomable',
			  'lightbox_is_draggable',
			  'lightbox_is_drag_auto_snap',
			  'lightbox_drag_tolerance_x',
			  'lightbox_drag_tolerance_y',
			  'lightbox_is_preload',
			  'lightbox_open_effect',
			  'lightbox_close_effect',
			  'lightbox_slide_effect',
			  'lightbox_see_more_text',
			  'lightbox_see_more_length',
			  'is_variants_color',
			  'is_variants_color_use_image',
			  'variants_color_attr_name',
			  'is_variants_size',
			  'is_variants_size_use_image',
			  'variants_size_attr_name',
			  'is_swap_image_on_variation_change',
			  'variants_active_border_color',
			  'variants_active_background_color',
			  'variants_hover_border_color',
			  'variants_hover_background_color',
			  'is_variants_show_label_on_image',
			);

			foreach ($availableSettings as $value) {
				if (isset($input[$value])) {
					$sanitary_values[$value] = $input[$value];
				}
			}

			return $sanitary_values;
		}

	}
endif;

new FlexiZoom_Admin();
