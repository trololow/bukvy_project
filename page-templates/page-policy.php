<?php
/**
 * Template Name: Policy-page
 */
?>
<?php get_header() ?>
<section class="policy-section">
    <div class="custom-wrapper">
        <div class="policy-container">
            <?php if ( have_posts() ) { ?>
                <?php while ( have_posts() ) { the_post() ?>
                    <?php the_content() ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>

<?php get_footer() ?>
