<?php $bk_global    = Helper::getGlobalSettings(); ?>
<?php $images_path  = get_template_directory_uri() .'/assets/images' ?>

<footer>
    <div class="footer-wrapper-inner">
        <div class="footer-navigation">
            <div class="navigation-item navigation-item-main">
                <div class="item-main-logo">
                    <a href="<? echo home_url() ?>">
                        <?php if( !empty( $logo = bk_get_option('_logo') ) ){ ?>
                            <img src="<?php echo $logo ?>" alt="logo">
                        <?php } ?>
                    </a>
                </div>

                <div class="item-main-url">
                    <a href="<?php echo home_url() ?>"><?php _e('bukvy.lviv.ua') ?></a>
                </div>

                <div class="item-main-socials">
                    <?php if( !empty( $bk_global['instagram'] ) ){ ?>
                        <a href="<?php echo $bk_global['instagram'] ?>">
                            <img src="<?php echo $images_path.'/instagram.svg' ?>" alt="">
                        </a>
                    <?php } ?>

                    <?php if( !empty( $bk_global['tik_tok'] ) ){ ?>
                        <a href="<?php echo $bk_global['tik_tok'] ?>">
                            <img src="<?php echo $images_path.'/tik_tok.svg' ?>" alt="">
                        </a>
                    <?php } ?>
                </div>
            </div>

            <div class="navigation-item navigation-item-menu">
                <?php DisplayFunctions::footerMenu() ?>
            </div>

            <?php if( empty( $categories = DisplayFunctions::bkTaxonomies() ) ){ ?>
                <div class="navigation-item navigation-item-categories">
                    <?php foreach( $categories as $item ){ ?>
                        <div class=""><a href=""><?php echo $item->name ?></a></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if(!empty( $bk_global['email'] )){ ?>
                <a class="footer-email" href="mailto:<?php echo $bk_global['email'] ?>">
                    <?php echo $bk_global['email'] ?>
                </a>
            <?php } ?>
        </div>

        <div class="footer-background">
            <?php if( !empty( $img_url = bk_get_option('_footer_background') ) ){ ?>
                <img src="<?php echo $img_url ?>" alt="">
            <?php } ?>
            <div class="footer-background-filter"></div>
        </div>

        <p class="footer-copyright" >&#169; <?php _e('2017-2023. Copyright. Всі права захищено.') ?></p>
    </div>
</footer>
