<?php
/*
 * Our work Module Template
 */

if( !defined( 'ABSPATH' ) || empty( $block ) ) exit;
if( GutenbergBlocks::checkForPreview( $block ) ) return;

$bg     = get_field('_background');
$custom_image = get_field('_images');
$images = [];

if( get_field('_is_from_post') ){
    $posts = get_field('_posts');
    
    foreach( $posts as $post ){
        $images[]['_image'] = get_the_post_thumbnail_url( $post->ID );
    }

}else{
    $images = $custom_image;
}
?>

    <section class="block-our-work-module-section">
        <div class="custom-wrapper">
            <div class="work-background animate__animated wow" data-wow-duration="0.5s" data-wow-offset="200" style="animation-name: fadeIn; visibility: hidden;">
                <img src="<?php echo $bg ?>" alt="">
            </div>

            <div class="work-container">
                <div class="work-container-inner">
                    <div class="work-container-filter"></div>

                    <div class="work-content">
                        <h3>&mdash;&nbsp;<?php _e('Наші роботи') ?>&nbsp;&mdash;</h3>
                        <?php if( !empty( $images ) ){ ?>
                            <div class="work-album ">
                                <?php $index = 0; ?>
                                <?php foreach( $images as $img_url ){ ?>
                                    <div class="img-block img-block-our-work" data-index="<?php echo $index++ ?>">
                                        <img src="<?php echo $img_url['_image'] ?>" alt="">
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <div class="work-btn">
                            <a href="/instaposts">
                                <?php _e('Дивитись всі роботи') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
