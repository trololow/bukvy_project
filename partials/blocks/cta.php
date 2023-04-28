<?php
/*
 * Cta Module Template
 */

if( !defined( 'ABSPATH' ) || empty( $block ) ) exit;
if( GutenbergBlocks::checkForPreview( $block ) ) return;

$link = get_field('_link');
$text = get_field('_text');
?>

<?php if( !empty( $link ) && !empty( $text ) ){ ?>
    <section class="block-hero-module-section">
        <div class="custom-wrapper">
            <a href="<? echo $link ?>"><? echo $text ?></a>
        </div>
    </section>
<?php } ?>