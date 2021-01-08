<?php
/**
 * Single Product Image
 *
 * @author        Flexible Web Design
 * @package       flexizoom-woocommerce-zoom-magnifier
 */

if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly

global $post, $product;

if (is_file(FLEXI_ZOOM_PATH . 'includes/helper.php')) {
	include_once FLEXI_ZOOM_PATH . 'includes/helper.php';
}
$post_id = $post->ID;
$image_ids = flexizoom_get_image_ids_by_post_id($post_id, $product);
?>


<div class="images">
    <div class="flexi-zoom-container">
        <div class="flexi-zoom">
            <?php echo flexizoom_print_main_image_html($image_ids, $post_id); ?>
            <?php echo flexizoom_print_additional_images_html($image_ids, $post_id); ?>
        </div>
    </div>
</div>

<style>
    .flexi-zoom-main-container .splide__arrow svg {
        fill: <?php echo flexizoom_get_option('zoom_arrow_color', '#6cb7e3'); ?>
    }
    .flexi-zoom-others-container .splide__arrow svg {
        fill: <?php echo flexizoom_get_option('slider_arrow_color', '#6cb7e3'); ?>
    }
    .flexi-zoom-others-container .splide__slide.is-active {
        border-color: <?php echo flexizoom_get_option('slider_active_border_color', '#6cb7e3'); ?>

    }
</style>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        window.flexiZoomSettings = {
            type: '<?php echo flexizoom_get_option('zoom_type', 'right'); ?>',
            previewWidth: <?php echo flexizoom_get_option('zoom_window_width', 0); ?>,
            previewHeight: <?php echo flexizoom_get_option('zoom_window_height', 0); ?>,
            previewOffsetX: <?php echo flexizoom_get_option('preview_offset_x', 15) ?>,
            previewOffsetY: <?php echo flexizoom_get_option('preview_offset_y', 0) ?>,
            hoverDelay: <?php echo flexizoom_get_option('hover_delay', 200) ?>,
            hoverOverlay: <?php echo flexizoom_get_option('is_hover_overlay', 'on') === 'on' ? 'true' : 'false' ?>,
            touchOverlay: <?php echo flexizoom_get_option('is_touch_overlay', 'on') === 'on' ? 'true' : 'false' ?>,
            isLightbox: <?php echo flexizoom_get_option('is_lightbox', 'on') === 'on' ? 'true' : 'false' ?>,
        };
        window.flexiZoom = new FlexiZoom(window.flexiZoomSettings);
    });
</script>
