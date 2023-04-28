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
                    <div class="main-socials-instagram"></div>
                </div>
            </div>

            <div class="navigation-item navigation-item-menu">
                <?php DisplayFunctions::footerMenu() ?>
            </div>

            <div class="navigation-item navigation-item-categories">
                <?php if( !empty( $categories = DisplayFunctions::bkTaxonomies() ) ){ ?>
                    <?php foreach( $categories as $item ){ ?>
                        <div class=""><a href=""><?php echo $item->name ?></a></div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>