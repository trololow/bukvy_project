<?php
/*
 * Cat Module Template
 */

if( !defined( 'ABSPATH' ) || empty( $block ) ) exit;
if( GutenbergBlocks::checkForPreview( $block ) ) return;

$title      = get_field('_title');
$subtitle   = get_field('_subtitle');
$items      = get_field('_items');
?>

    <section class="block-who-we-are-module-section">
        <div class="custom-wrapper">
            <div class="who-container">
                <?php if( !empty( $title ) ){ ?>
                    <div class="who-title animate__animated wow" data-wow-duration="1s" data-wow-offset="200" style="animation-name: fadeIn; visibility: hidden;"><?php echo $title ?></div>
                <?php } ?>

                <?php if( !empty( $subtitle ) ){ ?>
                    <div class="who-subtitle animate__animated wow" data-wow-duration="1s" data-wow-offset="200" style=" animation-name: fadeIn; visibility: hidden;"><?php echo $subtitle ?></div>
                <?php } ?>

                <?php if( !empty( $items ) ){ ?>
                    <div class="who-items scroll-cta scroll-left-by-click">
                        <?php foreach( $items as $item ){ ?>
                            <div class="who-item-wrapper animate__animated wow" data-wow-duration="1s" data-wow-offset="300" style="animation-name: fadeIn; visibility: hidden;">
                                <a href="<?php echo $item['_link']?>">
                                    <?php if( !empty( $item['_background'] ) ){ ?>
                                        <img src="<?php echo $item['_background'] ?>" alt="">
                                    <?php } ?>

                                    <div class="who-item-filter"></div>

                                    <?php if( !empty( $item['_text'] ) ){ ?>
                                        <div class="who-item-text">
                                            <h4><?php echo $item['_text'] ?></h4>
                                        </div>
                                    <?php } ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
