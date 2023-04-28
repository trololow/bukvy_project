<?php if( empty( $data ) ) return '' ?>

<section class="insta-posts-section">
    <div class="insta-wrapper-inner">
        <h1><?php _e('Наші роботи') ?></h1>

        <div class="insta-posts-container">
            <?php foreach( $data as $item ){ ?>
                <?php \Display::GetTemplatePart('instaposts/insta-post-loop', ['item' => $item]) ?>
            <?php } ?>
        </div>
    </div>
</section>