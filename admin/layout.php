<?php
/**
 * Admin Options Page Layout Container
 *
 * @author        Flexible Web Design
 * @package       flexizoom-woocommerce-zoom-magnifier
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

if (is_file(FLEXI_ZOOM_PATH . 'includes/helper.php')) {
	include_once FLEXI_ZOOM_PATH . 'includes/helper.php';
}
if (is_file(__DIR__ . '/formfields.php')) {
	include_once __DIR__ . '/formfields.php';
}

$tabs = array(
  'general' => __('General Settings', 'flexizoom-woocommerce-zoom-magnifier'),
  'settings' => __('Zoom Settings', 'flexizoom-woocommerce-zoom-magnifier'),
);

$brand = vsprintf(
  '<a href="%s" title="%s"><img src="%s"  class="flexizoom-admin-logo"/></a>',
  array(
	'https://www.flexiblewebdesign.com',
	'flexiblewebdesign.com',
	FLEXI_ZOOM_ADMIN_ASSETS . '/images/flexible_logo.png',
  )
);
?>
<div class="flexizoom-admin">
    <div class="container-fluid">
        <div class="mt-3 mb-4">
            <h2 class="d-flex align-items-center mb-3"><?php printf(esc_html__('FlexiZoom by %1$s', 'wp-image-zoooom'), $brand); ?></h2>
            <div class="text-color-gray-light text-italic text-size-small">FlexiZoom - Image Zoom Magnifier for WooCommerce
                adds zoom effect, lightbox
                modal and images slider product images. No jQuery dependency, writen using pure JavaScript
            </div>
        </div>
        <form action="options.php" method="post">
			<?php settings_fields('flexizoom_option_group'); ?>
			<?php do_settings_sections('flexizoom_option_group'); ?>
            <div class="row">
                <div class="col col-12 col-lg-7">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-bs-toggle="tab" href="#tab-zoom-settings"
                               role="tab">Zoom</a>
                            <a class="nav-item nav-link" data-bs-toggle="tab" href="#tab-additional-pics-settings"
                               role="tab">Additional
                                Pictures Slider</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact"
                               role="tab">Lightbox</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-variations"
                               role="tab">Variations</a>
                        </div>

                    </nav>
                    <div class="tab-content px-3 py-4" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tab-zoom-settings" role="tabpanel"
                             aria-labelledby="nav-home-tab">
							<?php echo flxizoom_admin_field_radiogroupbtns(
							  'zoom_type',
							  'right',
							  'Zoom Box Position',
							  array(
								array(
								  'name' => 'left',
								  'label' => 'Left'
								),
								array(
								  'name' => 'right',
								  'label' => 'Right'
								),
								array(
								  'name' => 'inside',
								  'label' => 'Inside (pro)',
								  'disabled' => true,
								),
								array(
								  'name' => 'lens',
								  'label' => 'Lens (pro)',
								  'disabled' => true,
								),
							  )
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_radiogroupbtns(
							  'zoom_slider_type',
							  'fade',
							  'Slide Effect',
							  array(
								array(
								  'name' => 'slide',
								  'label' => 'Slide (pro)',
                                  'disabled' => true,
								),
								array(
								  'name' => 'fade',
								  'label' => 'Fade'
								),
							  ),
							  ''
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'zoom_is_arrows',
							  'off',
							  'Arrows',
							  '',
							  'Display arrows on the main image to slide next/prev.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_colorpicker(
							  'zoom_arrow_color',
							  '#6cb7e3',
							  'Arrow Color',
							  'text',
							  '',
							  '',
							  'Set the color for arrows.',
							  ''
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'zoom_is_pagination',
							  'off',
							  'Pagination',
							  '',
							  'Display pagination dots below the main image.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'zoom_is_lazyload',
							  'on',
							  'Lazyload',
							  '',
							  'Lazyload the images. Does not applies to first image, which loads instantly.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_progressbar(
							  'zoom_level',
							  3,
							  1,
							  30,
							  1,
							  'Zoom Level',
							  '',
							  'Set the level for the zooming, users will be able to change the level if you enable the Zoom Level Indicator option.'
							);
							?>
                            <hr/>
							<?php echo flxizoom_admin_field_radiogroupbtns(
							  'zoom_level_indicator_type',
							  'hide',
							  'Show Zoom Level Changer',
							  array(
								array(
								  'name' => 'hide',
								  'label' => 'Hide'
								),
								array(
								  'name' => 'always',
								  'label' => 'Always (pro)',
								  'disabled' => true
								),
								array(
								  'name' => 'hover',
								  'label' => 'On Hover (pro)',
                                  'disabled' => true,
								)
							  ),
							  '',
							  'Zoom level bar lets users to change zooming level as they wish.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'inner_max_width',
							  992,
							  'Max-Width for Inner Zoom',
							  'number',
							  0,
							  'Recommended: 992px',
							  'Set the max-width for changing zoom type to inner zoom automatically. fyi: Inner zoom provides the best UX on touch-based devices and small screens.',
							  'px',
							  ''
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'zoom_window_width',
							  0,
							  'Preview Width',
							  'number',
							  0,
							  'Applies if zoom type is left or right preview',
							  'Set the pixel amount for preview window width. Set 0 to make it as same as the main image width.',
							  'px',
							  '',
                              '',
                              false
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'zoom_window_height',
							  0,
							  'Preview Height',
							  'number',
							  0,
							  'Applies if zoom type is left or right preview',
							  'Set the pixel amount for preview window height. Set 0 to make it as same as the main image height.',
							  'px',
                              '',
                              '',
                              false
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'preview_offset_x',
							  15,
							  'Preview Offset X',
							  'number',
							  0,
							  '',
							  'Set how far the preview window will be offseted from the image horizontally.',
							  'px',
                              '',
                              '',
                              false
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'preview_offset_y',
							  0,
							  'Preview Offset Y',
							  'number',
							  0,
							  '',
							  'Set how far the preview window will be offseted from the image vertically.',
							  'px',
							  '',
							  '',
							  false
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'lens_width',
							  200,
							  'Lens Width',
							  'number',
							  10,
							  'Applies if zoom type is Lens',
							  'Set the pixel amount for lens width',
							  'px'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'lens_height',
							  200,
							  'Lens Height',
							  'number',
							  10,
							  'Applies if zoom type is Lens',
							  'Set the pixel amount for lens height',
							  'px'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'is_hover_overlay',
							  'on',
							  'Hover Overlay',
							  '',
							  'If enabled, the overlay transparent box is display on picture when hovered.',
                              false
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'is_touch_overlay',
							  'off',
							  'Touch Overlay',
							  '',
							  'If enabled, the overlay transparent box is display on picture when touched.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'is_touch_enabled',
							  'off',
							  '2-Finger Support',
							  'Improves UX on mobile.',
							  'Choose whether or not you want enable 2-finger support on touch-screen support.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'two_finter_notice',
							  'Use two fingers to acviate zoom',
							  'Set 2-Finger Notice',
							  'text',
							  '',
							  '',
							  'This notice wil be visible on picture when picture is touched with 1-finger.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'touch_delay',
							  200,
							  'Touch Delay',
							  'number',
							  0,
							  '',
							  'Set a delay in millisecons between touching the picture and activating the zoom',
							  'ms'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'hover_delay',
							  200,
							  'Hover Delay',
							  'number',
							  0,
							  '',
							  'Set a delay in millisecons between hovering the picgture and activating the zoom',
							  'ms',
                              '',
                              '',
                              false
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'is_lens_stay_inside',
							  'off',
							  'Keep Lens Inside',
							  '',
							  'Choose whether or not you want to keep the lens inside, no overflow the image.'
							); ?>
                            <hr />
                        </div>
                        <div class="tab-pane fade" id="tab-additional-pics-settings" role="tabpanel">
							<?php echo flxizoom_admin_field_switcher(
							  'slider_is_enable',
							  'on',
							  'Slider',
							  '',
							  'You can disable the additional slider completely. If you enable arrows from the Zoom tab, users will still be able to navigate through pictures by clicking the next/prev arrows.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'slider_gap',
							  10,
							  'Gap',
							  'number',
							  0,
							  '',
							  'Set gap between slides.',
							  'px'
							); ?>
                            <hr/>
                            <div class="flexizoom-admin-group">
                                <div class="flexizoom-admin-group-title">Slider Position <span
                                            class="dashicons dashicons-editor-help" data-toggle="tooltip"
                                            title="Select the positions (relative to the main image) of additional pictures on different screen resolutions."></span>
                                </div>
                                <div class="flexizoom-admin-group-items">
									<?php echo flxizoom_admin_field_radiogroupbtns(
									  'thumbs_position_mobile',
									  'bottom',
									  'Mobile',
									  array(
										array(
										  'name' => 'bottom',
										  'label' => 'Bottom',
										),
										array(
										  'name' => 'left',
										  'label' => 'Left (pro)',
                                          'disabled' => true
										),
									  ),
									  'Screen size < 768px',
									  'Position (relative to the main image) of the additional pictures on mobile layout.'
									); ?>
									<?php echo flxizoom_admin_field_radiogroupbtns(
									  'thumbs_position_tablet',
									  'bottom',
									  'Tablet',
									  array(
										array(
										  'name' => 'bottom',
										  'label' => 'Bottom'
										),
										array(
										  'name' => 'left',
										  'label' => 'Left (pro)',
										  'disabled' => true
										),
									  ),
									  'Screen size < 768px',
									  'Position (relative to the main image) of the additional pictures on tablet layout.'
									); ?>
									<?php echo flxizoom_admin_field_radiogroupbtns(
									  'thumbs_position_web',
									  'bottom',
									  'Web',
									  array(
										array(
										  'name' => 'bottom',
										  'label' => 'Bottom'
										),
										array(
										  'name' => 'left',
										  'label' => 'Left (pro)',
										  'disabled' => true
										),
									  ),
									  'Screen size < 768px',
									  'Position (relative to the main image) of the additional pictures on web layout.'
									); ?>
                                </div>
                            </div>
							<?php echo flxizoom_admin_field_switcher(
							  'slider_is_keyboard',
							  'off',
							  'Keyboard Control',
							  '',
							  'Enable control slider and main image via keyboard.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'slider_is_arrows',
							  'on',
							  'Arrows',
							  '',
							  'Enable slider arrows.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'slider_is_caption',
							  'off',
							  'Caption',
							  '',
							  'Enable displaying image caption at the bottom thumbnails. This text is grabbed from caption field of the picture.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'slider_is_pagination',
							  'off',
							  'Pagination',
							  '',
							  'Enable slider pagination.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'slider_is_hide_thumbnails',
							  'off',
							  'Hide Thumbnails',
							  '',
							  'Hides the thumbnail pictures. If you enabled pagination, it will remain being displayed.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'slider_is_loop',
							  'off',
							  'Loop',
							  'Recommended: off',
							  'Choose whether or not want to enable loop.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_colorpicker(
							  'slider_arrow_color',
							  '#6cb7e3',
							  'Arrow Color',
							  'text',
							  '',
							  '',
							  'Set the color for arrows.',
							  ''
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_colorpicker(
							  'slider_active_border_color',
							  '#6cb7e3',
							  'Active Border Color',
							  'text',
							  '',
							  '',
							  'Set the border color for active thumbnail.',
							  ''
							); ?>
                            <hr/>
                            <div class="flexizoom-admin-group">
                                <div class="flexizoom-admin-group-title">Slides To Show <span
                                            class="dashicons dashicons-editor-help" data-toggle="tooltip"
                                            title="# of slides to show within slider on different resolutions"></span>
                                </div>
                                <div class="flexizoom-admin-group-items">
									<?php echo flxizoom_admin_field_textbox(
									  'slider_count_mobile',
									  4,
									  'Mobile',
									  'number',
									  1,
									  'Screen size < 768px',
									  '# of slides to show on mobile layout.'
									); ?>
									<?php echo flxizoom_admin_field_textbox(
									  'slider_count_tablet',
									  4,
									  'Tablet',
									  'number',
									  1,
									  'Screen size < 992px',
									  '# of slides to show on tablet layout.'
									); ?>
									<?php echo flxizoom_admin_field_textbox(
									  'slide_count_web',
									  4,
									  'Web',
									  'number',
									  1,
									  'Screen size < 1200px',
									  '# of slides to show on web layout.'
									); ?>
									<?php echo flxizoom_admin_field_textbox(
									  'slider_count_xl',
									  4,
									  'Wide',
									  'number',
									  1,
									  'Screen size > 1200px',
									  '# of slides to show on wide screen layout.'
									); ?>
                                </div>
                            </div>
							<?php echo flxizoom_admin_field_textbox(
							  'slider_per_move',
							  1,
							  'Slides Per Click',
							  'number',
							  1,
							  '',
							  '# of slides to scroll when next/prev buttons are clicked'
							); ?>
                            <hr />
							<?php echo flxizoom_admin_field_radiogroupbtns(
							  'slider_focus',
							  'center',
							  'Focus While Sliding',
							  array(
								array(
								  'name' => 'center',
								  'label' => 'Center'
								),
								array(
								  'name' => '0',
								  'label' => '1st Slide (pro)',
                                    'disabled'=> true
								),
							  ),
							  '',
							  'Set which slide should be focused while sliding next or prev.'
							); ?>
                            <hr />
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel">
							<?php echo flxizoom_admin_field_switcher(
							  'is_lightbox',
							  'on',
							  'Enable Lightbox',
							  '',
							  'Choose whether or not you want to enable lightbox to enlarge picture upon clicking.',
                              false
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_desc',
							  'off',
							  'Show Description',
							  '',
							  'Choose whether or not you want to show description box. Descriptions are taken from image\'s alt tag.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_show_title_in_desc',
							  'off',
							  'Include Product Name in Description',
							  '',
							  'Choose whether or not you want to show product name as title within the description box.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_radiogroupbtns(
							  'lightbox_desc_position',
							  'left',
							  'Description Location',
							  array(
								array(
								  'name' => 'left',
								  'label' => 'Left (pro)',
                                  'disabled' => true
								),
								array(
								  'name' => 'right',
								  'label' => 'Right (pro)',
								  'disabled' => true
								),
								array(
								  'name' => 'top',
								  'label' => 'Top (pro)',
								  'disabled' => true
								),
								array(
								  'name' => 'bottom',
								  'label' => 'Bottom (pro)',
								  'disabled' => true
								),
							  ),
							  '',
							  'Choose position for description, relative to the image.'
							); ?>
                            <hr />
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_close_button',
							  'off',
							  'Display Close Button',
							  '',
							  'Show or hide close button.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_autoplay_videos',
							  'on',
							  'Auto Play Videos',
							  '',
							  'Enable or disable auto play videos.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_loop',
							  'on',
							  'Loop',
							  '',
							  'Enable or disable loop.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_touch_nav',
							  'on',
							  'Touch Navigation',
							  '',
							  'Enable or disable loop.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_touch_follow_axis',
							  'on',
							  'Touch Follow Axis',
							  '',
							  'Image follow axis when dragging on mobile.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_keyboard_nav',
							  'on',
							  'Keyboard Nav',
							  '',
							  'Enable or disable keyboard navigation.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_close_on_outside_click',
							  'on',
							  'Close On Click Outside',
							  '',
							  'Enable or disable closing the lightbox on clicking outside.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_zoomable',
							  'on',
							  'Click To Zoom',
							  '',
							  'Enable or disable zooming within lightbox, when the image is larger than the screen.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_preload',
							  'off',
							  'Preload',
							  'Recommended "ON" for performance improvements.',
							  'Enable or disable preloading images.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_draggable',
							  'on',
							  'Mouse Dragging',
							  '',
							  'Enable or disable mouse draging to go prev and next picture.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'lightbox_is_drag_auto_snap',
							  'off',
							  'Auto Snap',
							  '',
							  'If true the picture will automatically change to prev/next or close if dragToleranceX or dragToleranceY is reached, otherwise it will wait till the mouse is released.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'lightbox_drag_tolerance_x',
							  40,
							  'Drag Tolerance X',
							  'number',
							  0,
							  '',
							  'Set number of pixels the user has to drag to go to prev or next picture.',
							  'px'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'lightbox_drag_tolerance_y',
							  65,
							  'Drag Tolerance Y',
							  'number',
							  0,
							  '',
							  'Set number of pixels the user has to drag to close the lightbox (Set 0 to disable vertical drag).',
							  'px'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'lightbox_width',
							  900,
							  'Default Width',
							  'number',
							  0,
							  'Recommended: 900px',
							  'Se the default width for inline elements and iframes.',
							  'px'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'lightbox_height',
							  506,
							  'Default Height',
							  'number',
							  0,
							  'Recommended: 506px',
							  'Set the default height for inline elements and iframes.',
							  'px'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'lightbox_video_width',
							  960,
							  'Default Video Width',
							  'number',
							  0,
							  'Recommended: 960px',
							  'Set the default width for videos. Since videos are responsive, height is not required.',
							  'px'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_radiogroupbtns(
							  'lightbox_open_effect',
							  'zoom',
							  'Open Effect',
							  array(
								array(
								  'name' => 'zoom',
								  'label' => 'Zoom'
								),
								array(
								  'name' => 'fade',
								  'label' => 'Fade (pro)',
                                    'disabled' => true
								),
								array(
								  'name' => 'none',
								  'label' => 'None (pro)',
								  'disabled' => true
								),
							  ),
							  'Choose an opening effect.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_radiogroupbtns(
							  'lightbox_close_effect',
							  'zoom',
							  'Close Effect',
							  array(
								array(
								  'name' => 'zoom',
								  'label' => 'Zoom'
								),
								array(
								  'name' => 'fade',
								  'label' => 'Fade (pro)',
								  'disabled' => true
								),
								array(
								  'name' => 'none',
								  'label' => 'None (pro)',
								  'disabled' => true
								),
							  ),
							  'Choose a closing effect.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_radiogroupbtns(
							  'lightbox_slide_effect',
							  'slide',
							  'Sliding Effect',
							  array(
								array(
								  'name' => 'slide',
								  'label' => 'Slide'
								),
								array(
								  'name' => 'zoom',
								  'label' => 'Zoom (pro)',
								  'disabled' => true
								),
								array(
								  'name' => 'fade',
								  'label' => 'Fade (pro)',
								  'disabled' => true
								),
								array(
								  'name' => 'none',
								  'label' => 'None (pro)',
								  'disabled' => true
								),
							  ),
							  'Choose a sliding effect.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'lightbox_see_more_text',
							  'See more',
							  'See More text',
							  'text',
							  '',
							  'Tip: Available for mobile only',
							  'See More text for descriptions on mobile devices.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'lightbox_see_more_length',
							  60,
							  'See More Text Length',
							  'number',
							  '',
							  'Tip: Available for mobile only',
							  'Set number of characters to display on the description before adding the see-more link, (set 0 to display the entire description).'
							); ?>
                            <hr/>
                        </div>
                        <div class="tab-pane fade" id="nav-variations" role="tabpanel">
							<?php echo flxizoom_admin_field_switcher(
							  'is_swap_image_on_variation_change',
							  'off',
							  'Swap Image On Variation Change',
							  'Applies to both main and additional images',
							  'Swap image when variation is changed. (fyi: you need to set an image for each possible color variation).'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'is_variants_color',
							  'off',
							  'Customized Color Variation',
							  '',
							  'Transform color variation selectbox into customized clickable buttons for better UX.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'is_variants_color_use_image',
							  'off',
							  'Use Images As Color Variations',
							  'TIP: You have to add image for each color variation, otherwise main image will be used.',
							  'Instead values, images will be used as variations. (fyi: you need to set an image for each possible color variation).'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'variants_color_attr_name',
							  'attribute_pa_color',
							  'Color Variation Name Attribute',
							  'text',
							  '',
							  'default: attribute_pa_color',
							  'In case you name the color variation name differently, the name of the field will be different for your case. Inspect the color selectbox field in the front-end to findout the name attribute.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'is_variants_size',
							  'off',
							  'Customized Size Variation',
							  '',
							  'Transform image variation selectbox into customized clickable buttons for better UX.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'is_variants_size_use_image',
							  'off',
							  'Use Images As Size Variations',
							  'TIP: You have to add image for each size variation, otherwise main image will be used.',
							  'Instead values, images will be used as variations. (fyi: you need to set an image for each possible color variation).'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_textbox(
							  'variants_size_attr_name',
							  'attribute_pa_size',
							  'Size Variant Name Attribute',
							  'text',
							  '',
							  'default: attribute_pa_size',
							  'In case you name the size variation name differently, the name of the field will be different for your case. Inspect the size selectbox field in the front-end to findout the name attribute.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_switcher(
							  'is_variants_show_label_on_image',
							  'off',
							  'Label On Image',
							  'Applicaple if "Use Images as Variation" is enabled.',
							  'Show value label on the bottom of the image, as subtitle.'
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_colorpicker(
							  'variants_hover_border_color',
							  '#cee6f9',
							  'Hover Border',
							  'text',
							  '',
							  '',
							  'Set the border color for image and size variants when they are hovered.',
							  ''
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_colorpicker(
							  'variants_hover_background_color',
							  '#ffffff',
							  'Hover Background',
							  'text',
							  '',
							  '',
							  'Set the background color for image and size variants when they are hovered.',
							  ''
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_colorpicker(
							  'variants_active_border_color',
							  '#6cb7e3',
							  'Active Border',
							  'text',
							  '',
							  '',
							  'Set the border color for image and size variants when they are active.',
							  ''
							); ?>
                            <hr/>
							<?php echo flxizoom_admin_field_colorpicker(
							  'variants_active_background_color',
							  '#f3faff',
							  'Active Background',
							  'text',
							  '',
							  '',
							  'Set the background color for image and size variants when they are active.',
							  ''
							); ?>
                            <hr/>
                        </div>
                    </div>
                    <div class="flexizoom-admin-save-button">
                        <div class="flexizoom-admin-save-button-shadow"></div>
                        <div class="flexizoom-admin-save-button-wrapper">
                            <span class="flexizoom-admin-save-button-changed">Don't forget to save your changes</span>
                            <button type="submit" class="btn btn-outline-primary" disabled>Save</button>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-lg-5"> <?php include_once 'preview.php'; ?></div>
            </div>
        </form>
    </div>

</div>
