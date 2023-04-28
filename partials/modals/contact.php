<?php $bk_global    = Helper::getGlobalSettings(); ?>
<?php $images_path  = get_template_directory_uri() .'/assets/images' ?>

<section class="contact-section" >
    <div class="custom-wrapper">
        <div class="contact-section-container">
            <h3 class="animate__fadeIn wow" data-wow-duration="1s" data-wow-offset="300" style=" visibility: hidden;"><?php _e('Оберіть спосіб зв`язку, який вам підходить:') ?></h3>
            <div class="contact-section-items">

                <div class="contact-section-item-social">
                    <?php if(!empty( $bk_global['instagram'] )){ ?>
                        <div class="social-item">
                            <img src="<?php echo $images_path .'/instagram.png' ?>" alt="instagram" class="animate__fadeInLeft wow" data-wow-duration="1s" data-wow-offset="100" style=" visibility: hidden;">

                            <p><?php _e('Найшвидкий зв`язок з нами - це instagram') ?> <br>
                                <a href="<?php echo $bk_global['instagram'] ?>">@bukvy.lviv.ua</a>
                            </p>
                        </div>
                    <?php } ?>

                    <?php if(!empty( $bk_global['telegram'] )){ ?>
                        <div class="social-item" >
                            <img src="<?php echo $images_path .'/telegram.png' ?>" alt="telegram" class="animate__fadeInLeft wow" data-wow-duration="1s" data-wow-offset="100" style=" visibility: hidden;">

                            <p><?php _e('Зв`яжіться з нами через telegram') ?> <br>
                                <a href="<?php echo $bk_global['telegram'] ?>">@bukvy.lviv.ua</a>
                            </p>
                        </div>
                    <?php } ?>

                    <?php if(!empty( $bk_global['email'] )){ ?>
                        <div class="social-item">
                            <img src="<?php echo $images_path .'/email.png' ?>" alt="email" class="animate__fadeInLeft wow" data-wow-duration="1s" data-wow-offset="100" style=" visibility: hidden;">

                            <p><?php _e('Напишіть нам на електронну пошту') ?> <br>
                                <a href="mailto:<?php echo $bk_global['email'] ?>"><?php echo $bk_global['email'] ?></a>
                            </p>
                        </div>
                    <?php } ?>
                </div>
                
                
                <div class="contact-section-item-qr-code">
                    <img src="<?php echo $images_path .'/insta-follow.jpg' ?>" alt="qr">
                </div>
            </div>
        </div>
    </div>
</section>