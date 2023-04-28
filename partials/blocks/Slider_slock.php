<?php
/*
 * Slider Module Template
 */

if( !defined( 'ABSPATH' ) || empty( $block ) ) exit;
if( GutenbergBlocks::checkForPreview( $block ) ) return;

$images = get_field('_images');
?>

<section class="block-slider-module-section">
    <div class="custom-wrapper">
        <div class="block-slider-module">
            <?php if( !empty( $images ) ){ ?>
                <?php foreach( $images as $img_href){ ?>
                    <?php if( !empty( $img_href['image'] ) ){ ?>
                        <div class="slide-wrapper">
                            <img src="<?php echo $img_href['image'] ?>" alt="slider">
                            <div class="dark-filter"></div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="slider-module-arrow slider-module-arrow-left"></div>
        <div class="slider-module-arrow slider-module-arrow-right"></div>
    </div>
</section>