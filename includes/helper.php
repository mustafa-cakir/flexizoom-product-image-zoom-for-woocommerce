<?php
/**
 * Helper
 *
 * @author        Flexible Web Design
 * @package       flexizoom-woocommerce-zoom-magnifier
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

if (!function_exists('flexizoom_get_option')) {
	function flexizoom_get_option($param, $default = null)
	{
		$options = get_option('flexizoom_options', array());
		return isset($options[$param]) ? $options[$param] : $default;
	}
}
if (!function_exists('flexizoom_get_image_ids_by_post_id')) {
	function flexizoom_get_image_ids_by_post_id($post_id, $product = null)
	{
		$product = isset($product) ? $product : wc_get_product($post_id);
		$image_ids = array(get_post_thumbnail_id($post_id));
		$additional_images_ids = version_compare(WC()->version, '3.0.0', '<') ? $product->get_gallery_attachment_ids() : $product->get_gallery_image_ids();
		if (!empty($additional_images_ids) && count($additional_images_ids) > 0) $image_ids = array_merge($image_ids, $additional_images_ids);

		// make sure ids are unique
		$image_ids = array_unique($image_ids);

		function _remove_empty($value)
		{
			return !empty($value) && $value !== 0;
		}

		$image_ids = array_filter($image_ids, '_remove_empty');;

		return $image_ids;
	}
}
if (!function_exists('flexizoom_print_main_image_html')) {
	function flexizoom_print_main_image_html($images_ids, $post_id)
	{
		$template = '';
		if (isset($images_ids) && count($images_ids) > 0) {
			$extra_class = '';
			if (flexizoom_get_option('zoom_is_pagination', 'off') === 'on') {
				$extra_class .= ' has-pagination';
			}
			if (flexizoom_get_option('zoom_is_arrows', 'off') === 'on') {
				$extra_class .= ' has-arrows';
			}
			$template = sprintf('<div class="flexi-zoom-main-container"><div class="splide %s"><div class="splide__track"><div class="splide__list">', $extra_class);
			$count = 0;
			foreach ($images_ids as $image_id) {
				$image_title = esc_attr(get_the_title($image_id));
				$image_src_medium = wp_get_attachment_image_url($image_id, apply_filters('single_product_large_thumbnail_size', 'shop_single'));
				$image_src_large = wp_get_attachment_image_url($image_id, 'full');

				$product = wc_get_product($post_id);
				$lightbox_desc = '';
				if (flexizoom_get_option('lightbox_is_show_title_in_desc', 'on') === 'on') {
					$lightbox_desc .= 'title: ' . $product->get_name() . ';';
				}
				if (flexizoom_get_option('lightbox_is_desc', 'on') === 'on') {
					$img_meta = wp_prepare_attachment_for_js($image_id);
					$lightbox_desc .= 'description: <p>' . $image_title . '</p>';
					if (isset($img_meta) && isset($img_meta['caption']) && !empty($img_meta['caption'])) {
						$lightbox_desc .= '<p>' . preg_replace("/\r|\n/", "", (esc_html($img_meta['caption']))) . '</p>';
					}
					if (isset($img_meta) && isset($img_meta['description']) && !empty($img_meta['description'])) {
						$lightbox_desc .= '<p>' . preg_replace("/\r|\n/", "", (esc_html($img_meta['description']))) . '</p>';
					}
					$lightbox_desc .= ';';
				}

				if ($count > 1 && flexizoom_get_option('zoom_is_lazyload', 'on') === 'on') {
					$src = 'data-splide-lazy="' . $image_src_medium . '"';
				} else {
					$src = 'src="' . $image_src_medium . '"';
				}

				$template .= sprintf('<div class="splide__slide"><img data-flexi-large="%s" %s data-flexizoom-lightbox="%s" alt="%s" data-flexizoom-lightbox-index="%s" /></div>'
				  , $image_src_large, $src, $lightbox_desc, $image_title, $count);
				$count++;
			}
			$template .= '</div></div></div></div>';
		} else {
			$template .= sprintf('<img src="%s" alt="Placeholder" />', wc_placeholder_img_src());
		}

		return apply_filters('woocommerce_single_product_image_html', $template, $post_id);
	}
}
if (!function_exists('flexizoom_print_additional_images_html')) {
	function flexizoom_print_additional_images_html($image_ids, $post_id)
	{
		$template = '';
		if (isset($image_ids) && count($image_ids) > 1 && flexizoom_get_option('slider_is_enable', 'on') === 'on') {
			$extra_class = '';
			if (flexizoom_get_option('slider_is_pagination', 'off') === 'on') {
				$extra_class .= ' has-pagination';
			}
			if (flexizoom_get_option('slider_is_arrows', 'on') === 'on') {
				$extra_class .= ' has-arrows';
			}
			if (flexizoom_get_option('slider_is_hide_thumbnails', 'off') === 'on') {
				$extra_class .= ' hide-thumbnails';
			}
			$template .= sprintf('<div class="flexi-zoom-others-container"><div class="splide %s"><div class="splide__track"><div class="splide__list">', $extra_class);

			foreach ($image_ids as $image_id) {
				$image_title = esc_attr(get_the_title($image_id));
				$image_thumbnail_url = wp_get_attachment_image_url($image_id, apply_filters('single_product_large_thumbnail_size', 'shop_single'));
				$template .= sprintf('<div class="splide__slide"><img src="%s" alt="%s" /></div>', $image_thumbnail_url, $image_title
				);
			}
			$template .= '</div></div></div></div>';
		}
		return apply_filters('woocommerce_single_product_image_thumbnail_html', $template, $post_id);
	}
}