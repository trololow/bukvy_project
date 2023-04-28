<header>
    <div class="bukvy-top">
        <div class="bukvy-wrapper-inner">
            <div class="top-navigation">
                <div class="top-navigation-item top-navigation-item-name">
                    <a href="<? echo home_url() ?>">
                        <p><?php _e('bukvy.lviv.ua') ?></p>
                        <span>|</span>
                        <p class="navigation-item-description"><?php _e('Об`ємні букви та фігури') ?></p>
                    </a>
                </div>

                <div class="top-navigation-item top-navigation-item-logo">
                    <div class="top-logo">
                        <a href="<? echo home_url() ?>">
                            <?php if( !empty( $logo = bk_get_option('_logo') ) ){ ?>
                                <img src="<?php echo $logo ?>" alt="">
                            <?php } ?>
                        </a>
                    </div>
                </div>

                <?php DisplayFunctions::headerMenu() ?>
                <div class="top-burger-mobile">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>