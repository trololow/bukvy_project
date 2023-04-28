<?php
/*
 * Cat Module Template
 */

if( !defined( 'ABSPATH' ) || empty( $block ) ) exit;
if( GutenbergBlocks::checkForPreview( $block ) ) return;

$image = get_field('_hero_image');
?>

<?php if( !empty( $image ) ){ ?>
    <section class="block-hero-module-section">
        <div class="custom-wrapper">
            <div class="hero-container" >
                <div class="image-hero parallax-window" speed="1" bleed="2" data-parallax="scroll"
                data-image-src="<?php echo $image ?>"></div>
                <div class="hero-filter"></div>
            </div>
        </div>
    </section>
<?php } ?>