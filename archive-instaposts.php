<?php $image = bk_get_option('_header_image'); 

$page_number = !empty( get_query_var('paged') )? get_query_var('paged'): 1 ?>

<?php $insta_posts = new \WP_Query([
        'post_type' => 'instaposts',
        'posts_per_page' => 24,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $page_number,
    ]); ?>
<?php get_header() ?>

    <div class="insta-single-top">
        <div class="single-top-image parallax-window" speed="1" bleed="2" data-parallax="scroll"
        data-image-src="<?php echo $image ?>"></div>
    </div>

    <section class="insta-posts-section">
        <div class="insta-wrapper-inner">
            <h1><?php _e('Унікальні дизайни та <br>індивідуальний підхід до кожного.') ?></h1>

            <div class="insta-posts-container">
                <?php if ( $insta_posts->have_posts() ) { ?>
                    <?php while ( $insta_posts->have_posts() ) { $insta_posts->the_post() ?>
                        <?php \Display::GetTemplatePart('instaposts/insta-post-loop', ['item' => [
                            'insta_id'          => get_the_ID(),
                            'permalink'         => get_the_permalink( get_the_ID() ),
                            'caption'           => get_the_content(),
                            'image_url_local'   => get_the_post_thumbnail_url(),
                        ]]) ?>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="insta-load-more-wrap">
                <?php 

                the_posts_pagination( array(
                    'mid_size' => 2,
                    'prev_text' => __( 'Назад ', 'textdomain' ),
                    'next_text' => __( 'Вперед', 'textdomain' ),
                    ) ); ?>
            </div>
        </div>
    </section>

<?php get_footer() ?>
