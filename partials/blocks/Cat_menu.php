<?php
/*
 * Cat Module Template
 */

if( !defined( 'ABSPATH' ) || empty( $block ) ) exit;
if( GutenbergBlocks::checkForPreview( $block ) ) return;

$cat_items = get_field('_cat_items');
?>

<?php if( !empty( $cat_items ) ){ ?>
    <section class="block-cat-module-section">
        <div class="custom-wrapper">
            <div class="cat-container">
                <?php foreach( $cat_items as $item ){ ?>
                    <div class="cat-container-item">
                        <a href="<?php echo $item['_link'] ?>">
                            <?php echo $item['_name'] ?>
                        </a>
                    </div>
                <?php } ?>

                <div class="cat-container-item">
                    <a href="#">
                        <?php _e('Замовити') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>