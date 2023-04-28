<?php $image = bk_get_option('_header_image'); ?>

<?php get_header() ?>
<div class="insta-single-top">
    <div class="single-top-image parallax-window" speed="1" bleed="2" data-parallax="scroll"
    data-image-src="<?php echo $image ?>"></div>
</div>

<section class="insta-single-section">
    <div class="custom-wrapper">
        <?php if ( have_posts() ) { ?>
            <?php while ( have_posts() ) { the_post() ?>
                <div class="insta-single-title">
                    <h1><?php _e('Висока якість та низька ціна - ідеальний вибір!') ?></h1>
                </div>

                <div class="insta-single-back">
                    <a href="<?php echo $_SERVER['HTTP_REFERER']  ?>" ><?php _e('&#8592; Повернутись назад') ?></a>
                </div>

                <div class="insta-single-container">
                    <div class="insta-container-image-wrap popup-image-click">
                        <button class="popup-close-button">
                            <span></span>
                            <span></span>
                        </button>

                        <img src="<?php the_post_thumbnail_url() ?>" alt="">
                    </div>

                    <div class="insta-container-content">
                        <a href="/" class="insta-container-home"><?php _e('Bukvy.lviv.ua'); ?></a>
                        <p class="insta-container-sku"><?php _e('Код замовлення: '); the_title(); ?></p>
                        <?php the_content() ?>
                        <hr>

                        <p><?php _e('&#129154; товар реалізується <b>під замовлення</b>') ?><br></p>

                        <p>
                            <?php _e('Доставка товару по всій Україні:') ?><br>
                            <?php _e('- Нова Пошта, Укрпошта.') ?><br><br>
                            <?php _e('Безготівкова та готівкова <b>оплата</b>.') ?>
                        </p>

                        <p><span><?php _e('Ви можете замовити товар зі <b>схожим дизайном!</b>') ?></span><br></p>
                        <button class="button-scroll"><?php _e('Замовити схожий виріб ') ?><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>

                <div class="insta-random-post">
                    <?php echo do_shortcode('[insta_random]') ?>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</section>

<?php echo do_shortcode( '[insta_contact_socials]' ) ?>
<?php get_footer() ?>
