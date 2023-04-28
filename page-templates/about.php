<?php
/**
 * Template Name: About
 */
?>
<?php $image = bk_get_option('_header_image'); ?>

<?php get_header() ?>
    <div class="insta-single-top">
        <div class="single-top-image parallax-window" speed="1" bleed="2" data-parallax="scroll"
        data-image-src="<?php echo $image ?>"></div>
    </div>

    <h1 class="bukvy-pages-header"><?php the_title() ?></h1>

    <section class="about-page-section">
        <div class="custom-wrapper">
            <div class="about-page-container">
                <?php if ( have_posts() ) { ?>
                    <?php while ( have_posts() ) { the_post() ?>
                        <?php the_content() ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>


<?php get_footer() ?>
