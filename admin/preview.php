<?php
/**
 * Admin Options Page Preview Section
 *
 * @author        Flexible Web Design
 * @package       flexizoom-woocommerce-zoom-magnifier
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

$image_folder = FLEXI_ZOOM_ADMIN_ASSETS . '/images/dummyImages'
?>

<div class="flexizoom-admin-preview">
    <h4>Preview</h4>

    <div class="flexi-zoom">
        <div class="flexi-zoom-main-container">
            <div class="splide">
                <div class="splide__track">
                    <div class="splide__list">
                        <div class="splide__slide">
                            <img
                                    data-flexi-large="<?php echo $image_folder ?>/large/black_1.jpg"
                                    src="<?php echo $image_folder ?>/medium/black_1.jpg"
                                    data-flexizoom-lightbox="title: Sample Product #2;description: <p>Title: White_2</p><p>Color: White</p><p>&lt;hr /&gt;&lt;h4&gt;It supports HTML&lt;/h4&gt;&lt;p&gt;Image&#039;s &quot;Description&quot; field is used to fill this area.&lt;/p&gt;&lt;p&gt;External link: &lt;a href=&quot;http://ww.google.com&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;click for more&lt;/a&gt;&lt;/p&gt;&lt;p&gt;List&lt;/p&gt;&lt;ul&gt;&lt;li&gt;List item 1&lt;/li&gt;&lt;li&gt;List item 2&lt;/li&gt;&lt;li&gt;List item 3&lt;/li&gt;&lt;li&gt;List item 4&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong&gt;The standard Lorem Ipsum passage, used since the 1500s&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;&lt;/p&gt;&lt;br/&gt;&lt;br/&gt;&lt;p&gt;&lt;strong&gt;Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC&lt;strong&gt;&lt;/p&gt;&lt;p&gt;&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;&lt;/p&gt;</p>;"
                                    alt="Test Main image"
                                    data-flexizoom-lightbox-index="0"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    data-flexi-large="<?php echo $image_folder ?>/large/black_2.jpg"
                                    src="<?php echo $image_folder ?>/medium/black_2.jpg"
                                    alt="Test Main image"
                                    data-flexizoom-lightbox-index="1"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    data-flexi-large="<?php echo $image_folder ?>/large/white_1.jpg"
                                    src="<?php echo $image_folder ?>/medium/white_1.jpg"
                                    alt="Test Main image"
                                    data-flexizoom-lightbox-index="2"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    data-flexi-large="<?php echo $image_folder ?>/large/white_2.jpg"
                                    src="<?php echo $image_folder ?>/medium/white_2.jpg"
                                    alt="Test Main image"
                                    data-flexizoom-lightbox-index="3"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    data-flexi-large="<?php echo $image_folder ?>/large/pink_1.jpg"
                                    src="<?php echo $image_folder ?>/medium/pink_1.jpg"
                                    alt="Test Main image"
                                    data-flexizoom-lightbox-index="4"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    data-flexi-large="<?php echo $image_folder ?>/large/pink_2.jpg"
                                    src="<?php echo $image_folder ?>/medium/pink_2.jpg"
                                    alt="Test Main image"
                                    data-flexizoom-lightbox-index="5"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flexi-zoom-others-container">
            <div class="splide has-arrows">
                <div class="splide__track">
                    <div class="splide__list">
                        <div class="splide__slide">
                            <img
                                    src="<?php echo $image_folder ?>/thumb/black_1.jpg"
                                    alt="Black image #1"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    src="<?php echo $image_folder ?>/thumb/black_2.jpg"
                                    alt="Black image #2"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    src="<?php echo $image_folder ?>/thumb/white_1.jpg"
                                    alt="White Dress #1"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    src="<?php echo $image_folder ?>/thumb/white_2.jpg"
                                    alt="White Dress #2"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    src="<?php echo $image_folder ?>/thumb/pink_1.jpg"
                                    alt="Pink Dress #1"
                            />
                        </div>
                        <div class="splide__slide">
                            <img
                                    src="<?php echo $image_folder ?>/thumb/pink_2.jpg"
                                    alt="Pink Dress #2"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


