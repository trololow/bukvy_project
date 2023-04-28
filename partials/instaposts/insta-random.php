<?php if( empty( $posts ) ) return; ?>

<section class="insta-random-section">
    <div class="custom-wrapper">
        <h2><?php _e('Це може вас зацікавити') ?></h2>

        <div class="insta-random-container scroll-left-by-click scroll-cta">
            <?php if ( $posts->have_posts() ) { ?>
                <?php while ( $posts->have_posts() ) { $posts->the_post() ?>
                    <a href="<?php the_permalink() ?>">
                        <div class="insta-random-item">
                            <div class="random-item-image">
                                <img src="<?php the_post_thumbnail_url()?>" alt="">
                            </div>
                            
                            <div class="random-item-content text-limit-line-4">
                                <?php the_content() ?>
                                <?php if( empty( get_the_content() )){ ?>
                                    <?php _e('#логотипи #декор #bukvylvivua') ?>
                                <?php } ?>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
