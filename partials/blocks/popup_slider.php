<?php
/*
 * Popup slider Module Template
 */

if( !defined( 'ABSPATH' ) || empty( $block ) ) exit;
if( GutenbergBlocks::checkForPreview( $block ) ) return;

$from_posts = Helper::getFieldByBlock( '_is_from_post', 'our-work' );
$images = [];

if( $from_posts ){
    $posts = Helper::getFieldByBlock( '_posts', 'our-work' );

    foreach( $posts as $post ){
        $images[] = get_the_post_thumbnail_url( $post );
    }

}else{
    $from_custom = Helper::getFieldByBlock( '_images', 'our-work' );
    $images = [];
    
    foreach( $from_custom as $image_field ){
        foreach( $image_field as $image_id ){
            $images [] = Helper::getImageUrlById( $image_id );
        }
    }
}


?>

<section class="block-popup-slider-module-section is-hide resize-watch-helper">
    <div class="custom-wrapper">
        <button class="popup-close-button">
            <span></span>
            <span></span>
        </button>

        <div class="popup-slider-container">
            <div class="popup-slider-slick">
                <?php foreach( $images as $image_url ){ ?>
                    <div class="popup-img-wrapper">
                        <img  src="<?php echo $image_url ?>" alt="">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
