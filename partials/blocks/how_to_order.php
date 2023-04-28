<?php
/*
 * How to order Module Template
 */

if( !defined( 'ABSPATH' ) || empty( $block ) ) exit;
if( GutenbergBlocks::checkForPreview( $block ) ) return;

$title  = get_field('_title');
$items  = get_field('_items');

$top        = get_field('_top');
$link_url   = get_field('_link_url');
$link_text  = get_field('_link_text'); ?>

    <section class="block-order-module-section animate__animated wow" data-wow-duration="1s" data-wow-offset="300" style="animation-name: fadeIn; visibility: hidden;">
        <div class="custom-wrapper ">
            <div class="order-container">
                <?php if( !empty( $title ) ){ ?>
                    <h4><?php echo $title ?></h4>
                <?php } ?>

                <?php if( !empty( $items ) ){ ?>
                    <div class="order-items-content scroll-left-by-click scroll-cta">
                        <?php foreach( $items as $item ){ ?>
                            <div class="order-item">
                                <?php echo $item['_text'] ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
