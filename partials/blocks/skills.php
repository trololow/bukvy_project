<?php
/*
 * Our work Module Template
 */

if( !defined( 'ABSPATH' ) || empty( $block ) ) exit;
if( GutenbergBlocks::checkForPreview( $block ) ) return;

$title  = get_field('_title');
$items  = get_field('_items');
$top    = get_field('_top');
?>

    <section class="block-skills-module-section " >
        <div class="custom-wrapper ">
            <div class="skills-container animate__animated wow" data-wow-duration="1s" data-wow-offset="200" style="animation-name: fadeIn; visibility: hidden;" >
                <?php if( !empty( $title ) ){ ?>
                    <h4><?php echo $title ?></h4>
                <?php } ?>

                <?php if( !empty( $items ) ){ ?>
                    <div class="skills-items-container">
                        <?php foreach( $items as $item ){ ?>
                            <div class="skiill-item">
                                <div class="skiill-item-title"><?php echo $item['_item_title'] ?></div>
                                <div class="skiill-item-subtitle"><?php echo $item['_item_subtitle'] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
